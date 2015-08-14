<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->default('no-slug');
            $table->string('title')->default(trans('lang.topic_title'));
            $table->integer('author_id')->default(1);
            $table->integer('category_id')->default(1);
            $table->integer('type')->default(0); // 0 - normal topic, 1 - Q&A
            $table->boolean('locked')->default(false);
            $table->boolean('pinned')->default(false);
            $table->integer('post_id')->default(1);
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
        Schema::drop('topics');
    }
}
