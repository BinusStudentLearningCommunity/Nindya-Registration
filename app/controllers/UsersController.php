<?php

class UsersController extends BaseController{
	public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

    public function getRegisterAdmin() {
        return View::make('users.register-admin');
    }

    public function postCreate() {
    	$rules = array(
    		'username' => 'required',
	        'password' => 'required|alpha_num|confirmed',
	        'password_confirmation' => 'required|alpha_num',
    		);
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $user = new User;
            $user->username = Input::get('username');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            return Redirect::to('user/login')->with('message', 'Thanks for registering!');
        } else {
            return Redirect::to('user/register-admin')
                ->with('message', 'The following errors occurred')
            	->withErrors($validator)->withInput();
        }
    }

    public function getLogin() {
        return View::make('users.login');
    }

    public function postSignin() {
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
            return Redirect::to('pendaftar')->with('message', 'You are now logged in!');
        } else {
            return Redirect::to('user/login')
                            ->with('message', 'Your username/password combination was incorrect')
                            ->withInput();
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to('user/login')->with('message', 'Your are now logged out!');
    }

}