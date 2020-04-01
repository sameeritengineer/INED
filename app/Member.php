<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['name','slug','description','image','alt','meta_title','meta_keyword','meta_description','sort','status'];
}
