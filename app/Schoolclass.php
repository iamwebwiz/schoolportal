<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schoolclass extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded =  ['id'];

    public function sessionsettings(){
        return $this->belongsTo('App\Sessionsetting');
    }

    public function staff(){
        return $this->belongsToMany('App\Staff');
    }
    public function students(){
        return  $this->belongsToMany('App\Student');
    }
    public function subjects(){
        return $this->belongsToMany('App\Subject');
    }
    public function section(){
        return $this->belongsTo('App\Section');
    }
    public function session(){
        return $this->belongsTo('App\Sessionsetting');
    }
    public function books(){
        $this->hasMany('App\Book');
    }
    
}
