<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tags;

class TagsController extends Controller
{
    public function index(Tags $tag){

          $posts = $tag->posts;

          return view('posts.index', compact('posts'));

    }

}
