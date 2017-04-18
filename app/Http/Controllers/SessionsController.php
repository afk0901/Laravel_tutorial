<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller

{

	public function __construct(){

		//Only non-authenticated users can see the login.

		$this->middleware('guest',['except' => 'destroy']);
	}

    public function create(){

    	return view('sessions.create');

    }


    public function destroy(){

    	auth()->logout();//Logout the user.

    	return redirect('/posts');
    }


    public function store(){

    	//Attempt to authenticate the user with the email and the password and sign him in.
    	//So if authentication fails, return back.

    	$pass = bcrypt(request('password'));

    	if(auth()->attempt(request(['email','password']))){

    		return redirect('posts');
    	}

    	 return back()->withErrors([

                'message' => 'Username or password is incorrect!'

              	]);

    	
    }
}
