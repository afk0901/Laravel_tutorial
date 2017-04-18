<?php

//A reopository is a collection of queries

//elequent is powerful but we can have a long statements

//and to organize things it's best to put them in a repo

//Maybe we have a lot of quires related to posts so then we do a

//specific class for that - a collection of posts.

namespace App\Repositiories;


use App\Post;

use App\Redis;

class Posts{

protected $radis;

//Now Laravel knows that we need to use the Redis class
//because Laravel always checkes the contructors for a dependency
//That's pretty cool, we only need to inject it to the constructor.
//Laravel checks the constructors to build these things up

//Repo is a collection of things. Maybe we have some queries that don't
//belong in the model, but we don't want to have them in the contro
//lloer, because that's just messy and we need to perform them, like for example dependancies
//So a repo is then the right place!

public function __construct(Redis $radis)
{

	$this->radis = $radis;
}
	
public function all()

{

	return Post::latest()->get();
}


}