<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_general extends Model
{
    protected $fillable = [
        'name', 'email', 'country', 'role', 'is_contributor', 'password', 'is_email_verified'
    ];
}
