<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller


{
    public function create(){

    	return view('registration.create');
    }

    //Made a form request so the validation and insertion to a database is in the RegistrationForm class at
    //App->Requests->RegistrationForm

    public function store(RegistrationForm $form){

      //nothing will ever happen here until the form is validated.

           $form->persist();

           session('message','A default message');

           //session(['message' => 'something custom']);

           //invalid at next page request

           session()->flash('message','Thanks So Much For Signing Up!');
           
          return redirect('/posts');
    }
}
