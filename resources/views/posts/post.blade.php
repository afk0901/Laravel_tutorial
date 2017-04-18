<div class="blog-post">
            <h2 class="blog-post-title">

              <a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>

            <p>{{$post->created_at->toFormattedDateString()}} Updated at: {{$post->updated_at->toFormattedDateString()}}</p>
             
             <p>Created by: {{''}}</p>

            {{$post->body}}
          </div><!-- /.blog-post -->

