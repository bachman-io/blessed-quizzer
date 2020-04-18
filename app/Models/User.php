<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['id', 'name', 'discriminator'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
