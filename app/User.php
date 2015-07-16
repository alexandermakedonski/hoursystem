<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','bDate','salary'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function users(){

        return \App\User::all();
    }

    public function roles()
    {
        $roles = $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $roles;
    }

    public function categoryServices()
    {
        $categories = $this->belongsToMany('App\Category','user_categories','user_id','category_id');
        return $categories;
    }

    public function services()
    {
        $services = $this->belongsToMany('App\Service','user_services','user_id','service_id');
        return $services;
    }
}
