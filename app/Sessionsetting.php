<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sessionsetting extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['session', 'session_details'];

    public function schoolclasses(){
        $this->hasMany('App\Schoolclass');
    }

}
