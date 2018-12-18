<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographs extends Model
{
    protected $fillable = ['text', 'photo', 'status','created_at','updated_at'];
    public $timestamps = true;
}
