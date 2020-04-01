<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = ['name','slug','education','designation','location','description','image','alt','category_id','subcategory_id','meta_title','meta_keyword','meta_description','sort','status'];
}
