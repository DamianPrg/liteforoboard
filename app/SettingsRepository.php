<?php

namespace App;

class SettingsRepository
{
	/**
	 * 
	 * @return App\GroupSettings
	 */
	public function getGroupSettings()
	{
		return \App\GroupSettings::find(1);
	}

	/**
	 *
	 * @return App\Settings
	 */
	public function getSettings()
	{
	}
}