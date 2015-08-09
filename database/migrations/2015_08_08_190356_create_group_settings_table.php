<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('default_user_group')->default(-1);
            $table->integer('default_admin_group')->default(-1);
            $table->integer('default_mod_group')->default(-1);

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
        Schema::drop('group_settings');
    }
}
