<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Post;

use Carbon\Carbon;



class ExampleTest extends TestCase
{
    //Rolls back all transactions - so nothing goes in the database for
    //real, just testing it.
 
   
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->get('/posts')->assertSee('The Bootstrap Blog');
         
        //Get the post with the month now 
        $first = factory(Post::class)->create();

        //Get the post since last month

        $second = factory(Post::class)->create([
        
        'created_at' => Carbon::now()->subMonth()

            ]

            );

        //Get everything 
        $posts = Post::archives();

        //Create two posts

        //$this->assertCount(2, $posts);

   

        $this->assertEquals([

        [
    "year" => $first->created_at->format('Y'),
         "month" => $first->created_at->format('F'),
         "published" => 1,
],

[

        "year" => $second->created_at->format('Y'),
         "month" => $second->created_at->format('F'),
         "published" => 1 

],

            ], $posts);
    }
}
