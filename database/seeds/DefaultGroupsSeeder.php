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
            'name' => 'Member',
            'color' => '#222'
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
            'name' => 'Administrator',
            'color' => '#f00'
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
            'name' => 'Moderator',
            'color' => '#0f0'
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
            'name' => 'Banned',
            'color' => '#000'
        ]);

        $this->groupSettings->update(['banned_group' => $group->id]);

    }
}
