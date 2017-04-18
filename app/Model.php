<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

//Then, extends Eloquent and we are ready.
class Model extends Eloquent
{
	//protected $fillable
    protected $guarded = [];
}