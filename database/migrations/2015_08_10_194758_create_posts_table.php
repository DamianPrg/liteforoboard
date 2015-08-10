<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('');
            $table->text('message');
            $table->integer('author_id')->default( 1 );
            $table->integer('topic_id')->default( 1 );

            $table->boolean('reported')->default(false);
            $table->boolean('liked')->default(false); // use in Q&A topic types.


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
