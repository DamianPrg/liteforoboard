<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Group;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remove all records
        \DB::table('users')->truncate();

        // create default groups
        $this->createAdministratorGroup();

        // seed administrator account
        $this->createAdministratorAccount();

        // seed test account
        $this->createTestAccount();
    }

    /**
     * Create administrator group
     */
    public function createAdministratorGroup()
    {
    	$adminGroup = Group::create([
    			'name' => 'Administrator',
    			'color' => '#f00'
    	]);
    }

    /**
     * Create administrator account
     */
     public function createAdministratorAccount()
     {
         $user = User::create([
                'username' => 'Admin',
                'password' => bcrypt('admin'),
                'active'   => true
        ]);
     }

    /**
     * Create test account
     */
    public function createTestAccount()
    {
        $user = User::create([
            'username' => 'Test',
            'password' => bcrypt('test'),
            'active'   => true,
        ]);
    }
}
