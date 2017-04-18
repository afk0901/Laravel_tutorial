<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


use App\User;

use App\Mail\Welcome;

use Mail;


class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //Laravel validates the name, email and the password.
    public function rules()
    {
        return [
            
            'name' => 'required',

           'email' => 'required|email',

           'password' => 'required|confirmed'

        ];
    }


    //None of this will happen unless the form is validated.
    //because we injected the RegistrationRequest class.
    //in our controller.

    public function persist(){
         

        //Put name, email and password post variables to the create method in User that store him in the database.
          $user = User::create(

            $this->only([


             'name','email', 

             'password'


             ])

                );

      

          auth()->login($user);//Login the user.


            //Gets the instance of the Mail class and
            //injects the user into the constructor
            //and return our email view.
          
            Mail::to($user)->send(new Welcome($user));

    }
}