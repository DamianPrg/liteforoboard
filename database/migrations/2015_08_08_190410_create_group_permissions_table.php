<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_permissions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('permission_action')->default('none'); // edit, view, create,
            $table->string('permission_type')->default('none'); // thread, post, acp, modcp
            $table->integer('content_id')->default(-1); // post, thread, anything...
            $table->integer('group_id')->nullable();

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
        Schema::drop('group_permissions');
    }
}
