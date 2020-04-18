<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = ['category_id', 'question_text', 'answer_text', 'source_url', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}
