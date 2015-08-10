<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->default(-1);
            $table->string('title')->default(trans('lang.category_title'));
            $table->text('desc');
            $table->boolean('redirect')->default(false);
            $table->string('redirect_url')->default('#');
            $table->boolean('display_announcement')->default(false);
            $table->text('announcement_message')->nullable();
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
        Schema::drop('categories');
    }
}
