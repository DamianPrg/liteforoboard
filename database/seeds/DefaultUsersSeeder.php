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

        // seed administrator account
        $this->createAdministratorAccount();

        // seed test account
        $this->createTestAccount();
    }

    /**
     * Create administrator account
     */
     public function createAdministratorAccount()
     {
         $user = User::create([
                'username' => 'Admin',
                'password' => bcrypt('admin'),
                'active'   => true,
                'group_id' => 3 // group 3 is Admin group.
        ]);

         $user->updateSlug();
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

        $user->updateSlug();
    }
}
