<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AccountController extends Controller
{
    public function getIndex(){

        $roles = \DB::table('roles')->select('id', 'role_title')->get();
        $root_categories = \App\Category::whereIsRoot()->get();
        $categories = \App\Category::get();
        return view('accounts.index',compact('roles','root_categories','categories'));
    }

    public function getUserstable(){
        $users = \App\User::all();
        $roles = \DB::table('roles')->select('id', 'role_title')->get();
        $root_categories = \App\Category::whereIsRoot()->get();
        $categories = \App\Category::get();
        return \Response::json(\View::make('partials.userstable',compact('users','roles','root_categories','categories'))->render(),200);
    }

    public function postNamechange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['name' => \Request::input('value')]);
    }

    public function postRolechange(){

        \App\User::where('id','=',\Request::input('pk'))->update(['role_id' => \Request::input('value')]);

    }

    public function postBdatechange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['bdate' => \Request::input('value')]);
    }
    public function postSalarychange(){
        \App\User::where('id', '=', \Request::input('pk'))->update(['salary' => \Request::input('value')]);
    }

    public function postOffice(){

        $bool = \Request::input('bool');
        $this->officesync($bool);
        return \Response::json('true',200);
    }

    protected function officesync($bool){
        if($bool == 'true'){
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categories()->attach($category_id);
            return \Response::json('true',200);
        }else{
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categories()->detach($category_id);
            return \Response::json('false',200);
        }
    }

}
