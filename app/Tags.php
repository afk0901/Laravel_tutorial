<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model

{
     public function posts(){

        //Any posts tmay have many tags

        //Any tag can be applied to a postSo we use

        //belongsToMany() - Each Post belongs to many Tags - Laravel know that because we are in the Tags model (this class)

        //and it uses the primary keys in the table so, primarykey in Tags table to primary key in Post table

        //as we return the model (Post::class).

        return $this->belongsToMany(Post::class);
    }



    
    //Tells the route to use name instead of primary key.
    public function getRouteKeyName(){

    	return 'name';
    }

}
