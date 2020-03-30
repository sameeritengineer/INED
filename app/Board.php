<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $fillable = ['name','slug','designation','s_description','l_description','image','alt','category_id','subcategory_id','meta_title','meta_keyword','meta_description','sort','status','h_status'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
