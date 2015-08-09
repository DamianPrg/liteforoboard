<?php

use Illuminate\Database\Seeder;

class DefaultGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('groups')->truncate();
    	\DB::table('group_permissions')->truncate();

    	$this->createUsersGroup();
    	$this->createAdminsGroup();
    	$this->createModsGroup();
    	$this->createBannedGroup();
    }

    /**
     * Create default members group
     */
    public function createUsersGroup()
    {

    }

    /**
     * Create default administrators group
     */
    public function createAdminsGroup()
    {

    }

    /**
     * Create default mods group
     */
    public function createModsGroup()
    {

    }

    /**
     * Create default banned group
     */
    public function createBannedGroup()
    {

    }
}
