<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quizy02 extends Model
{
    // protected $table = 'quizy';

    public function quiz(){
        return $this->hasMany('app/quiz');
    }
}
