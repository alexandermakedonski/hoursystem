<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $table = 'roles';

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','user_roles','role_id','user_id');
    }


}
