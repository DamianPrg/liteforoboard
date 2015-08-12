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
    	\DB::table('settings')->truncate();
    	\DB::table('group_settings')->truncate();
        //
        $this->createSettings();
        $this->createGroupSettings();
    }

    public function createSettings()
    {
    	$settings = \App\Settings::create([]);
    }

    /**
     *
     */
    public function createGroupSettings()
    {
    	$groupSettings = \App\GroupSettings::create([]);
    }
}
