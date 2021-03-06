<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->default('no-slug');
            $table->string('username')->default('username');
            $table->string('password')->default('password');
            $table->string('email')->default('email@email.com');
            $table->string('profile_pic')->default('');
            $table->boolean('active')->default(0);
            $table->string('activation_key')->nullable();
            $table->integer('group_id')->default(1); // 1 is members group
            $table->string('title')->default('I am member...');
            $table->string('signature')->default('');
            $table->string('about_me')->default('Im doing great.');

          //  $table->date('last_activity');
            $table->timestamp('last_activity');
            $table->boolean('online')->default(false);


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
        Schema::drop('users');
    }
}
