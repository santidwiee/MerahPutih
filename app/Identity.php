<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = 'identity';

    protected function setUsiaAtribute($value){
        $this->attributes['tanggallahir'] = $value;
        $this->attributes['usia'] = Carbon::parse($value)->age;
    }
}
