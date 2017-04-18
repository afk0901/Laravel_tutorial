<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App;

use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view ){


        $tags = App\Tags::has('posts')->pluck('name');

        $archives = App\Post::archives();

        $view->with(compact(['tags', 'archives']));
                 

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()

    {
       $this->app->bind(Stripe::class, function(){

        $key = bcrypt(config('services.stripe.secret'));

     return new Stripe($key);

});

    }
}
