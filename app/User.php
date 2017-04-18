<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts(){

        return $this->hasMany(Post::class);
    }

    public function publish(Post $post){

        //Save the post to the database, as the posts method has these records because 
        //it returns all the records related to the post and the user, then we can to it that way:
        //else we have to call on create and put in some arrays.
         
         $this->posts()->save($post);

    }
}
