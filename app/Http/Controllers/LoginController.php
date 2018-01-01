<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;

class LoginController extends Controller
{
    /**
     * 
     *
     * @param  Request  $req
     * @return Response
     */
    
    public function loginUser(Request $req)
    {
    	$email = $req['email'];
    	$password = $req['password'];

    	$dt = LoginModel::LoginUser($email, $password);
    	if (is_string($dt)) {
    		//set session
    		session(['iduser' => $dt]);
    		return 'success';
    	} else {
    		return "failed";
    	}
    }
    public function SignupUser(Request $req)
    {
    	$name = $req['name'];
        $email = $req['email'];
        $password = $req['password'];
        $address = $req['address'];
    	$data = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
        	'address' => $address,
        	'photo' => ''
        );
        $rest = LoginModel::CreateAccount($data);
        if ($rest) {
        	//create session
        	session(['iduser' => $email]);

        	//redirect
        	redirect(url('/'));
        }
        else {
            echo 'failed';
        }
    }
    public function loginAdmin(Request $req)
    {
    	$email = $req['email'];
    	$password = $req['password'];

    	$dt = LoginModel::LoginAdmin($email, $password);
    	if (is_string($dt)) {
    		//destroy session iduser
    		//session()->forget('iduser');

    		//set session
    		session(['idadmin' => $dt]);

    		return 'success';
    	} else {
    		return 'failed';
    	}
    }
    public function logout()
    {
        session()->forget('iduser');
        return redirect()->guest(url('/'));
        //return redirect()->guest($_GET['url']);
    }
    public function logoutAdmin()
    {
        session()->forget('iduser');
        session()->forget('idadmin');
        return redirect()->guest(url('/admin'));
        //return redirect()->guest($_GET['url']);
    }
}
