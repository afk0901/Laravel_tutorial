<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositiories\Posts;

use App\Comment;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct(){

        //If not logged in, then don't show anything except index and show views.

        $this->middleware('auth')->except(['index','show']);
    }
    
    /*Laravel now tries it's best to create a object of this 
    class, and we inject it in our method - called the fancy
    nam Auto Reolution or an automatic depandency injection, 
    automatic because we did not create
    any instance of the class. Very, fancy, just means
    passing an object into a argument, wich means the method is
    dependand to the object.
    */

    public function index(Posts $posts){

         
        
        //See? we just begin to use it without declearing any instance.
        $posts = $posts->all();
       
        //Get the latest posts but send the query and the get request of month and  year to the filter method in Post.php

        $posts = Post::latest()->filter(request(['month','year']))->get();

        $archives = Post::archives();

        return view('posts.index', compact('posts'));
    }


     public function show(Post $post){// Select * from mytable where primary key = $post or where primary
        //key is the wildcard.

     
    	return view('posts.show',compact('post'));//Take the $post variable over to the view
    }

    public function ulala(){

    	return view('posts.ulala');
    }

    public function create(){//The area that we create the post.

    	return view('posts.create');


    }

    public function store(){//Store is called on a submit

    //Create a new post using the request data	

     //Method 1:
     /*$post = new Post;

     $post->title = request('title');

     $post->body = request('body');


     //save it to the database

     $post->save();*/

     //Validate these inputs, title and body as required, that is not empty and title max 10 characters.

     $this->validate(request(),[

       'title' => 'required|max:100',

       'body' => 'required'

       ]

     	);

     //Method 2, need to add fillable or guarded to the Post class:
     
     
     //Creates and saves our data in the database. same as insert into does, 
     //it takes (requests) these variables from the POST variable, as we are going to post something to the server.
 
     auth()->user()->publish(new Post(request(['title','body'])));

     //When the post

     /*
     Post::create([

        'title' => request('title'),
        'body' => request('body'),
        'user_id' => auth()->user()->id

     	]);
        */

     //And then redirect to the home page

     session()->flash('message','Your post is now published!');

     return redirect('/posts');

    }
     
     //To store our comment in the database
    public function store_comment(Post $post){//Select * from table where primary key = $post wildcard.
        
        //Validate
         $this->validate(request(),[

            'comment' => 'required']

            );

            //and store it - post request comment and it stores in the Comment table
          $id = Post::find($post);


           $post->addcomment(request('body'));

          return back(); 

         

    }
}
