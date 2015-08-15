<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(DefaultSettingsSeeder::class); // seed default settings
        $this->call(DefaultGroupsSeeder::class);   // seed groups
        $this->call(DefaultUsersSeeder::class);	   // seed default users
        $this->call(DefaultContentSeeder::class);

        Model::reguard();
    }
}
