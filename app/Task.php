<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/*This is a query scope, it takes in a query
	and then we can add something to it, like 
	where clauses, like and so on.
	So when we call this function here
	we can use get() for example, and get
	everything that's has the table completed
	at 0 that's not completed. We have to use 
	the word scope at the beginning so Laravel knows that we are
	using a scope.
	*/
    public function scopeincomplete($query)

    {

    	return $query->where('completed',0);
    }
}
