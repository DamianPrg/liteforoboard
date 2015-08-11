<?php

use Illuminate\Database\Seeder;
use App\User;

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
