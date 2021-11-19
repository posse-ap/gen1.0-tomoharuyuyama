<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizyQuaestion extends Model
{
    protected $table = 'QuizyQuaestionTable';
    protected $fillable = ['imgpath','prefecture_id','question_id'];
}
