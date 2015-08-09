<?php

use Illuminate\Database\Seeder;

class DefaultSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createGroupSettings();
    }

    /**
     *
     */
    public function createGroupSettings()
    {
    	$groupSettings = \App\GroupSettings::create([]);
    }
}
