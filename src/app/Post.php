<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['learned_date', 'learning_content_id', 'learning_hour'];
}
