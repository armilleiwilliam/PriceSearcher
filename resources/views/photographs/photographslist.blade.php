@include('layout.header')

<!-- Validation messages -->
@if(Session::get('error_msg'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        {{Session::get('error_msg')}}
    </div>
@elseif(Session::get('success_msg'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success !</h4>
        {{Session::get('success_msg')}}
    </div>
@endif
<!-- End Validation messages -->

<!-- List of photographs -->
<div class="margin-10">
    <a class="btn btn-primary" href="/insertphotograph">Add a photograph</a>
</div>
<table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="5" class="text-center">Photographs list</th>
    </tr>
    <tr>
        <th>Photograph caption</th>
        <th>Status</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @if(!empty($photographs))
        @foreach($photographs as $photograph)
            <tr>
                <td>{{$photograph->text}}</td>
                <td>
                    @if($photograph->status)
                        Completed
                    @endif
                </td>
                <td>
                    @if($photograph->photo !== '' && $photograph->photo !== 'NULL' && $photograph->photo != null)
                        <img src="{{url('/images/')}}/{{$photograph->photo}}" width="100" class="border border-primary" />
                    @endif
                </td>
                <td>
                    <a href="{{'editphotograph'}}/{{$photograph->id}}">
                        <button class="btn btn-success">Edit</button>
                    </a>
                    <a href="{{'deletephotograph'}}/{{$photograph->id}}">
                        <button class="btn btn-danger delete">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">No photograph</td>
        </tr>
    @endif

    </tbody>
</table>
<!-- END list of photographs -->

<!-- Pagination -->
@if(!empty($pagination))
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if($pag > 0)
                <li class="page-item"><a class="page-link" href="?pag={{$pag - 1}}">Previous</a></li>
            @endif

            @for($ind = 0; $ind < $pagination; $ind++)
                @if($ind == $pag)
                    <li class="page-item active"><a class="page-link" href="?pag={{$ind}}">{{$ind + 1}}</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="?pag={{$ind}}">{{$ind + 1}}</a></li>
                @endif
            @endfor

            @if($pagination > ($pag + 1))
                <li class="page-item"><a class="page-link" href="?pag={{$pag + 1}}">Next</a></li>
            @endif
        </ul>
    </nav>
    @endif
    <script>
        $(document).ready(function(){
            $(document).off('click', '.delete').on('click', '.delete',function () {
                var confirmedDelete = confirm("Are you sure you want to delete this record ?");
                if (confirmedDelete) {
                    var hrefURL = $(this).attr('href');
                    window.location.href = hrefURL;
                }
            });
        });
    </script>
@include('layout.footer')