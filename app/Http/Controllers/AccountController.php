<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AccountController extends Controller
{
    public function getIndex(){

        $root_categories = \App\Category::whereIsRoot()->get();
        $categories = \App\Category::get();
        return view('accounts.index',compact('roles','root_categories','categories'));
    }

    public function postNamechange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['name' => \Request::input('value')]);
    }

    public function postRolechange(){

        DB::table('user_roles')->where('user_id','=',\Request::input('pk'))->update(['role_id' => \Request::input('value')]);

    }

    public function postBdatechange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['bdate' => \Request::input('value')]);
    }
    public function postSalarychange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['salary' => \Request::input('value')]);
    }

    public function postOffice(){
        $bool = \Request::input('bool');
        if($bool == 'true'){
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categoryServices()->attach($category_id);
            return 'true';
        }else{
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categoryServices()->detach($category_id);
            return 'false';
        }
    }

}
