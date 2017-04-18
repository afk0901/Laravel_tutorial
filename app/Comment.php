<?php

namespace App;

//Laravel sees that in this table the comment table,
//we have a _id that is post_id in this table
//and then knows that we have to use that, and then
//Laravel finds all primary id's in the posts table 
//and then connects it. It makes a foreign key connection
//like we did some years ago in GSO.

class Comment extends Model
{
    
    public function post()

    {
    	//This comment belongs to a post so return all comments that belongs to a post.
        return $this->belongsTo(Post::class);
    }

      //Search for a user_id with the id of the user and make some relations to it.
    public function user(){

    	return $this->belongsTo(User::class);
    }
}