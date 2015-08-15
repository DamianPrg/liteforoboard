<?php

use Illuminate\Database\Seeder;

class DefaultGroupsSeeder extends Seeder
{
    protected $groupSettings = null;

    public function __construct(\App\SettingsRepository $settingsRepository) {
        $this->groupSettings = $settingsRepository->getGroupSettings();
    }

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
        $group = \App\Group::create([
            'id'   => 1,
            'name' => 'Member',
            'color' => '#464646'
        ]);

        $group->addPermission('can', 'login');

        $this->groupSettings->update(['default_user_group' => $group->id]);

    }

    /**
     * Create default administrators group
     */
    public function createAdminsGroup()
    {
        $group = \App\Group::create([
            'id'   => 3,
            'name' => 'Administrator',
            'color' => '#db5565'
        ]);

        $group->addPermission('access', 'acp');
        $group->addPermission('*', '*');       // can do anything

        $this->groupSettings->update(['default_admin_group' => $group->id]);
    }

    /**
     * Create default mods group
     */
    public function createModsGroup()
    {
        $group = \App\Group::create([
            'id' => 2,
            'name' => 'Moderator',
            'color' => '#66c796'
        ]);

        $group->addPermission('access', 'modcp');

        $this->groupSettings->update(['default_mod_group' => $group->id]);

    }

    /**
     * Create default banned group
     */
    public function createBannedGroup()
    {
        $group = \App\Group::create([
            'id'   => 4,
            'name' => 'Banned',
            'color' => '#000'
        ]);

        $this->groupSettings->update(['banned_group' => $group->id]);

    }
}
