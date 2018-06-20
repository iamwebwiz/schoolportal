<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded =  ['id'];

    public function sections(){
        return $this->belongsToMany('App\Section');
    }

    public function schoolclasses() {
        return $this->belongsToMany('App\Schoolclass');
    }
    public function users(){
        return $this->hasOne('App\User');
    }
}
