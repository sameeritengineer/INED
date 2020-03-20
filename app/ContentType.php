<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    public function libraries()
    {
    	return $this->hasMany('App\Library');
    }
}
