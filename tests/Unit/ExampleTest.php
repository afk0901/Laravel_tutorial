<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
   
      //Rolls back all transactions
  

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->get('/posts')->assertSee('The Bootstrap Blog');
         
        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
        
        'created_at' => Carbon::now()->subMonth()

            ]

            );

        $posts = Post::archives();

        $this->assertCount(2, $posts);
    }
}
