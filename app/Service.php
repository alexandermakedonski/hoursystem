<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;

    protected $table = 'services';

    protected $fillable = ['category_id','name','price','time'];

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function users()
    {
        $users = $this->belongsToMany('App\User','user_services','service_id','user_id');
        return $users;
    }
}
