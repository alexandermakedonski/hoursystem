<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category  extends \Kalnoy\Nestedset\Node
{
    public $timestamps = false;

    protected $fillable = ['id','name','parent_id','_lft','_rgt'];


    public function users()
    {
        return $this->belongsToMany('App\User','user_category','category_id','user_id');
    }

    public function services()
    {
        return $this->hasMany('App\Service', 'category_id');
    }
}
