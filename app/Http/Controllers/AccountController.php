<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AccountController extends Controller
{
    public function getIndex(){

        $roles = \App\Role::orderBy('id', 'DESC')->get();
        $root_categories = \App\Category::whereIsRoot()->get();
        $categories = \App\Category::get();
        return view('accounts.index',compact('roles','root_categories','categories'));
    }

    public function getUserstable(){
        $users = \App\User::all();
        $roles = \App\Role::orderBy('id', 'DESC')->get();
        $root_categories = \App\Category::whereIsRoot()->get();
        $categories = \App\Category::get();
        return \Response::json(\View::make('partials.userstable',compact('users','roles','root_categories','categories'))->render(),200);
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
        $this->officesync($bool);
        return \Response::json('true',200);
    }

    protected function officesync($bool){
        if($bool == 'true'){
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categoryServices()->attach($category_id);
            return \Response::json('true',200);
        }else{
            $user_id = \Request::input('user_id');
            $category_id = \Request::input('category_id');
            $user = \App\User::find($user_id);
            $user->categoryServices()->detach($category_id);
            return \Response::json('false',200);
        }
    }

    public function postRegister()
    {

        $validator = $this->validator(\Request::all());

        if ($validator->fails())
        {
            return \Response::json(array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            ));
        }

        $this->create(\Request::all());

        return \Request::all();
    }

    public function validator(array $data)
    {
        return \Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'date' => 'required',
            'salary' => 'required|integer'
        ], [
            'name.required' => 'Името е задължително.',
            'name.max' => 'Максимална дължина на името 255 символа.',
            'email.required' => 'Имейлът е задължителен.',
            'email.email' => 'Невалиден имейл.',
            'email.max' => 'Максимална дължина на имейла 255 символа.',
            'email.unique' => 'Този имейл адрес се повтаря.',
            'password.required' => 'Паролата е задължителна.',
            'password.confirmed' => 'Потвърдената парола е грешна.',
            'password.min' => 'Минимална дължина на паролата 6 символа.',
            'date.required' => 'Датата е задължителна.',
            'salary.required' => 'Заплатата е задължителна.',
            'salary.integer' => 'Трябва да бъде число.'
        ]);
    }

    public function create(array $data)
    {
        $user = new \App\User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->salary = $data['salary'];
        $user->bDate = $data['date'];
        $user->password = bcrypt($data['password']);
        $user->save();
        if (array_key_exists('categories',$data)) {
            $user->categoryServices()->attach($data['categories']);
        }
        $user->roles()->attach($data['role']);

        return $user;
    }

    public function postUseravatar(){


        return \Plupload::receive('file', function ($file){
            // Store the uploaded file
            $email = \Request::input('email');
            $path = storage_path().'/profiles/'.$email.'/avatar/';
            \File::makeDirectory($path,  $mode = 0777, $recursive = true);
            $path = storage_path().'/profiles/'.$email.'/avatar/avatar.jpg';
            \Image::make($file->getRealPath())->save($path,30);
        });
    }


}
