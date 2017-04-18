<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });


         Schema::create('post_tags', function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('tags_id');
            //The post id is uniqe and the tag_id is uniqe and we use them to connect tha tables togheter,
            //and therefore they are primary keys and we 
            //are going to connect these keys to our post
            //table, but we do that in the model.

            $table->primary(['post_id','tags_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tags');
    }
}
