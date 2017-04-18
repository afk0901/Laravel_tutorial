<?php

namespace App;

use Carbon\Carbon;
//Extends our Model class in Model.php

//The post table is related to many things in the 
//comment table so we take the Comment model in
//and we use hasMany to connect these tables togheter.
//and get then all comments related to the post_id in the
//comment table.

//Laravel does a look into the comment table and sees
//that we have a column named post_id so that's
//what Laravel will use and then Laravel finds the id
//in the posts table and there we go. 
class Post extends Model
{
    public function comments()
    {
    	//Return table comment where it has many id's, - one to many relationship.
        //Get the comments associated with post_id
    	return $this->hasMany(Comment::class);//Comment::class = App/Comment
    }

    public function addcomment($body){

    	Comment::create([

            'body' => request('comment'),

            //As we are in the Post instance it jus does not make sense to use Post $post so we use $this.
            'post_id' => $this->id

            ]);

            //$this->comments()->create(compact('body')); //Does not work :( somehow...

    }

       //Search for a user_id with the id of the user and make some relations to it.
    public function user(){

    	return $this->belongsTo(User::class);
    }

    //Pass the query and the data. This is the filter method. scope only means that now Laravel knows that
    //it's supposed to put the query in for the first parameter and the data in the second.

    public function scopefilter($query, $filters){
          
          //If the user is asking about the month then find the month,
          //That is if $month wich is the monthname in the get request, if it is passed
          //to the filters variable that is if $month is in the $filters array, then
        //lookup the month in the database, as eluqent expects a number we use carbon to
        //get the month number only.

         if($month = $filters['month']) {

            $query->whereMonth('created_at', Carbon::parse($month)->month);
         }

         //Similiar things going on here unless here we look up the year if it is in the querystring $filters['year']

           if($year = $filters['year']) {

            $query->whereYear('created_at', $year);
         }


    }


    public static function archives(){

       

        /*$posts = Post::latest();//Basicly - somequery blablabala order by asc and then get everything.
         

         if($month = request('month')) {

            $posts->whereMonth('created_at', Carbon::parse($month)->month);
         }

           if($year = request('year')) {

            $posts->whereYear('created_at', $year);
         }

         $posts = $posts->get();*/

         //Select the year of the date, the month of the date count the records after the year and the month
         // as published (the name) then get the results and store them in an array.
        return static::selectRaw('year(created_At) year, monthname(created_at) month, count(*) published')
        ->groupby('year','month')
        ->orderByRaw('min(created_at) desc')->

        get()->

        toarray();

    }


    public function tags(){

        //Any posts tmay have many tags

        //Any tag can be applied to a postSo we use

        //belongsToMany() - Each Post belongs to many tags

        return $this->belongsToMany(Tags::class);
    }


}
