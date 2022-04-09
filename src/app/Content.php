<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    Public function content()
    {
        return $this->belongsTo('App\Post', 'learning_content_id', 'id');
    }
}
