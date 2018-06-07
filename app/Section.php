<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','slug', 'description', 'head'];

    public function staffs(){
        return $this->belongsToMany(App\Staff);
    }

}
