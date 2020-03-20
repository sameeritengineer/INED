<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    //
    protected $fillable = ['content_type_id','name','slug','description','subscription_type','date','url','upload','image','alt','category_id','subcategory_id','meta_title','meta_keyword','meta_description','status'];
    public function content_type()
    {
    	return $this->belongsTo('App\ContentType');
    }
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
