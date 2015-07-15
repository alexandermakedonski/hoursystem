<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Validator;

class LockScreenController extends Controller
{
    public function __construct(){
        $this->middleware('lockscreen');
    }

    public function getIndex()
    {

        if(Auth::check()){

            $data = $this->authUserInfo();
            session()->put('lockscreen',$data);
            Auth::logout();

        }else {

            $data = $this->hasSessoin();

        }

        return view('accounts.lock-screen',compact('data'));
    }

    public function authUserInfo(){
        $data[] = [
            'name' => Auth::user()->name,
            'profile_picture' => '/avatar/'.\Hashids::encode(Auth::user()->id,rand(0,100)),
            'email' => Auth::user()->email,
        ];

        return $data;
    }

    public function hasSessoin(){

        if (Session::has('lockscreen'))
        {
            $data = session()->get('lockscreen');
            return $data;

        }else{
            return redirect('/');
        }
    }

    public function postIndex(){

        $data = session()->get('lockscreen');
        $email = $data[0]['email'];
        $password = \Request::input('password');

        $validator = Validator::make(\Request::all(), [
            'password' => 'required',
        ]);

        $result = $this->result($email,$password,$validator);

        return $result;
    }

    public function result($email,$password,$validator)
    {
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            session()->forget('lockscreen');
            return redirect('/');
        }
        if ($validator->fails())
        {
            return redirect()->back()->withErrors(['Въведете парола']);
        }
        return redirect()->back()->withErrors(['Грешна парола.']);
    }
}
