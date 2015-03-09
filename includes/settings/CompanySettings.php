<?php

final class CompanySettings implements SettingsPageGroup {

	public function registerCompanySettings()
	{

	}

	public function registerCompanySettingsSection()
	{

	}

	public function registerCompanySettingsFields()
	{

	}

	public function getOptionsGroup()
	{
		// TODO: Implement getOptionsGroup() method.
	}

	public function getOptionsName()
	{
		// TODO: Implement getOptionsName() method.
	}

	public function registerSettings()
	{
		register_setting(
			'company_settings',
			'options_main',
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