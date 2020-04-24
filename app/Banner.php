<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = ['description','image','alt','meta_title','meta_keyword','meta_description','sort','status','redirect_url','font_size','color'];
}
