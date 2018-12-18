<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photographs;
use Illuminate\Support\Facades\DB;

class PhotographsController extends Controller
{
    private $photographs;

    function __construct(Photographs $photographs)
    {
        $this->photographs = $photographs;
    }

    public function photographsList(Request $request)
    {
        // set pagination parameters
        $pag = 0;
        if($request->pag){
            $pag = $request->pag;
        }
        $pagination = ceil(DB::table('photographs')->count() / 10);

        // get photographs list parameters
        $photographs = Photographs::select('id', 'text', 'photo', 'status')
                            ->offset($pag * 10)
                            ->limit(10)
                            ->orderby('id','asc')
                            ->get();

        return view('photographs/photographslist', ['photographs' => $photographs, 'pag' => $pag, 'pagination' => $pagination]);
    }

    public function photographEdit(Request $request)
    {
        $photographsDetails = Photographs::select('id', 'text', 'photo', 'status')->where('id', $request->id)->first();
        return view('photographs/editphotograph', ['photographDetails' => $photographsDetails]);
    }

    public function photographUpdate(Request $request)
    {
        // validation fields
        $request->validate([
            'text' => 'required|max:255',
            'status' => 'boolean',
            'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1700|dimensions:min_width=100,min_height=100',
        ]);

        $isUpdated = Photographs::where('id', $request->id)->update(['text' => $request->text]);

        // upload file
        if ($request->hasFile('input_img') && $isUpdated) {
            $image = $request->file('input_img');
            $name = $request->id . '_image.' . $image->getClientOriginalExtension();
            print_r($name);
            $destinationPath = public_path('/images');
            $imageMoveSuccess = $image->move($destinationPath, $name);
            $photographData = $this->photographs->find($request->id);
            $photographData->photo = $name;
            $photographData->status = 1;
            $photographData->save();
        }

        // show result messages
        if ($isUpdated) {
            return redirect()->back()->with('success_msg', trans('messages.photograph_updated'))->with('image',$request->image);
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }

    public function photographDelete(Request $request)
    {
        // check if the photograph is existing
        if($this->photographs->find($request->id)){

            // delete photograph
            $isDeleted = Photographs::where('id', $request->id)->delete();
            if ($isDeleted) {
                return redirect()->back()->with('success_msg', trans('messages.photograph_deleted'));
            } else {
                return redirect()->back()->with('error_msg', trans('messages.error_msg'));
            }
        } else {
            return redirect()->back()->with('error_msg', trans('messages.photograph_no_existing'));
        }
    }

    public function insertPhotograph(Request $request)
    {
        $photographsDetails = Photographs::select('id', 'text', 'photo', 'status')->where('id', $request->id)->first();
        return view('photographs/insertphotograph');
    }

    public function photographCreate(Request $request)
    {
        // validation fields
        $request->validate([
            'text' => 'required|max:255',
            'status' => 'boolean',
            'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1700|dimensions:min_width=100,min_height=100',
        ]);

        // create new photograph
        $photographCreation = new Photographs();
        $photographCreation->text = $request->text;
        $successSaving = $photographCreation->save();
        $imageMoveSuccess = true;

        // upload file
        if ($request->hasFile('input_img') && $successSaving) {
            $image = $request->file('input_img');
            $name = $photographCreation->id . '_image.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $imageMoveSuccess = $image->move($destinationPath, $name);
            $photographData = $this->photographs->find($photographCreation->id);
            $photographData->photo = $name;
            $photographData->status = 1;
            $photographData->save();
        }

        // return success messages
        if ($successSaving && $imageMoveSuccess) {
            return redirect()->back()->with('success_msg', trans('messages.photograph_created'))->with('id_photograph', $photographCreation->id);
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }
}
