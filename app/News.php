<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = ['name','slug','description','alt','image','category_id','subcategory_id','meta_title','meta_keyword','meta_description','sort','status'];
}
