<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgTestUser extends Model
{
    protected $table = 'ImgTestUsers';
    protected $fillable = ['imgpath', 'question_id'];

    
}
