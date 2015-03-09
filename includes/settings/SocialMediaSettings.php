<?php

trait SocialMediaSettings {

	public function registerSocialMediaSettings()
	{
		register_setting(
			'company_settings',
			'options_social_media',
			[$this, 'sanitize']
		);
	}

	public function registerSocialMediaSettingsSection()
	{
		add_settings_section(
			'company_settings_social_media', // ID
			'Social Media', // Title
			[$this, 'printSocialMediaSectionInfo'], // Callback
			'options_social_media' // Page
		);
	}

	public function registerSocialMediaSettingsFields()
	{
		add_settings_field(
			'facebook', // ID
			'Facebook', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['facebook']
		);

		add_settings_field(
			'twitter', // ID
			'Twitter', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['twitter']
		);

		add_settings_field(
			'pinterest', // ID
			'Pinterest', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['pinterest']
		);

		add_settings_field(
			'google', // ID
			'Google+', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['google']
		);

		add_settings_field(
			'tumblr', // ID
			'Tumblr', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['tumblr']
		);

		add_settings_field(
			'flickr', // ID
			'Flickr', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['flickr']
		);

		add_settings_field(
			'instagram', // ID
			'Instagram', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['instagram']
		);

		add_settings_field(
			'github', // ID
			'Github', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['github']
		);

		add_settings_field(
			'bitbucket', // ID
			'Bitbucket', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['bitbucket']
		);

		add_settings_field(
			'vimeo', // ID
			'Vimeo', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['vimeo']
		);

		add_settings_field(
			'youtube', // ID
			'YouTube', // Title
			[$this, 'textField'], // Callback
			'options_social_media', // Page
			'company_settings_social_media', // Section
			['youtube']
		);
	}

}