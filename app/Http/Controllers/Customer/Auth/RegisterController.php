<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer_guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:35|unique:customer',
            'address' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
            // TODO: use photo uploader in customer register
            'photo' => '/img/avatar.png',
        ]);
    }

    function showRegistrationForm()
    {
        return view('sign/up', [
            'title' => 'Sign Up',
        ]);
    }
}
