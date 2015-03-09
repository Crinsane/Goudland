<?php

final class MainSettings implements SettingsPageGroup {

	public function getOptionsGroup()
	{
		return 'main-settings';
	}

	public function getOptionsName()
	{
		return 'theme-settings';
	}

	public function registerSettings()
	{
		register_setting(
			$this->getOptionsGroup(),
			$this->getOptionsName(),
			[$this, 'sanitize']
		);
	}

	public function registerSection()
	{
		add_settings_section(
			'company_settings_main', // ID
			'Algemene instellingen', // Title
			[$this, 'printMainSectionInfo'], // Callback
			'options_main' // Page
		);
	}

	public function registerFields()
	{
		add_settings_field(
			'name', // ID
			'Naam', // Title
			[$this, 'textField'], // Callback
			'options_main', // Page
			'company_settings_main' // Section
		);
	}
}