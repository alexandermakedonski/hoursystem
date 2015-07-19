<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath =  '/account/login';
    protected $redirectAfterLogout = '/account/login';
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','postRegister','postUseravatar']]);
        //parent::__construct();
    }

    public function getLogin(){
        return view('accounts.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ],[
            'email' => 'Въведете валиден имейл',
            'email.required' => 'Имейлът е задължителен.',
            'email.max' => 'Имейлът съдържа максимум 255 символа.',
            'password.required' => 'Паролата е задължителна.'

        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function getRegister(){
        return 'xaxa';
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
        $user->role_id = $data['role'];
        $user->save();
        if (array_key_exists('categories',$data)) {
            $user->categories()->attach($data['categories']);
        }


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
