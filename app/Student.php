<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $dates =['deleted_at'];
    protected $guarded = ['id'];

    public function section() {
        return $this->belongsTo('App\Section');
    }

    public function schoolclasses() {
        return $this->belongsToMany('App\Schoolclass');
    }
}
