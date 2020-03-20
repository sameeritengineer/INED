<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','description','alt','image','cat_parent_id','meta_title','meta_keyword','meta_description','home_sort','ined_sort','status'];

    public function libraries()
    {
    	return $this->hasMany('App\Library');
    }
}
