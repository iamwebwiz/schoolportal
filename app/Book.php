<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function schoolclass()   {
        return $this->belongsTo('App\Schoolclass');
    }
}
