<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{   
    protected $fillable = ['schoolclass_id', 'name', 'staff_id', 'details'];
    public function schoolclass() {
        return $this->belongsTo('App\Schoolclass');
    }

    public function staff() {
        return $this->belongsToMany('App\Staff');
    }
}
