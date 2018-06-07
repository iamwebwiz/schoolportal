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
}
