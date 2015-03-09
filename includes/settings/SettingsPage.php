<?php

class SettingsPage {

	public static $settings = [
		'main' => 'MainSettings',
		'company' => 'CompanySettings'
	];

	public static $tabs = [
		'main' => 'Algemeen',
		'company' => 'Bedrijf'
	];

	public static $pageName = 'theme-settings';

	/**
	 * Register the settings page and options
	 */
	public function __construct()
	{
		add_action('admin_menu', [$this, 'addSettingsPage']);
		add_action('admin_init', [$this, 'buildSettingsPage']);
	}

	/**
	 * Add the settings page
	 */
	public function addSettingsPage()
	{
		add_menu_page(
			'Thema instellingen',
			'Thema instellingen',
			'manage_options',
			self::$pageName,
			[$this, 'displaySettingsPage']
		);
	}

	/**
	 * Display the settings page
	 */
	public function displaySettingsPage()
	{
		$tabs = self::$tabs;
		$currentTab = $this->getTab();

		?>
			<div class="wrap">
				<h2>Thema instellingen</h2>
				<h2 class="nav-tab-wrapper">
					<?php foreach($tabs as $key => $tab) :?>
						<a href="<?php menu_page_url('theme-settings');?>&tab=<?php echo $key;?>" class="nav-tab <?php echo $currentTab == $key ? 'nav-tab-active' : ''; ?>"><?php echo $tab;?></a>
					<?php endforeach;?>
				</h2>

				<form method="post" action="options.php">

					<?php
//						if($tab == 'main')
//						{
//							$setting = self::$settings[$tab];
//
////							require_once __DIR__ . '/' . $setting . '.php';
////
//							$instance = new $setting;
////							$instance->registerSettings();
////							$instance->registerSection();
////							$instance->registerFields();
//
//							settings_fields($instance->getOptionsGroup());
//							do_settings_sections($instance->getOptionsGroup());
//						}
					?>

					<?php submit_button();?>
				</form>
			</div>
		<?php
	}

	/**
	 * Build the company settings page
	 */
	public function buildSettingsPage()
	{
		foreach(self::$settings as $key => $setting)
		{
			require_once __DIR__ . '/' . $setting . '.php';

			$instance = new $setting;
			$instance->registerSettings();
			$instance->registerSection();
			$instance->registerFields();
		}
	}

	/**
	 * Sanitize the input from the form
	 *
	 * @param  array  $input
	 * @return array
	 */
	public function sanitize($input)
	{
		//

		return $input;
	}


	/**
	 * Print the main section info
	 */
	public function printMainSectionInfo()
	{
		echo 'Enter your main settings below:';
	}

	/**
	 * Print the social media section info
	 */
	public function printSocialMediaSectionInfo()
	{
		echo 'Enter your social media settings below:';
	}

	/**
	 *  Display the name field
	 *
	 * @param array $args
	 */
	public function textField($args)
	{
		$name = $args[0];

		echo '<input type="text" id="name" name="options_main[name]" value="' . $name . '">';
	}

	/**
	 * Display the social media field
	 *
	 * @param  array $args
	 * @return string
	 */
	public function socialMediaField($args)
	{
		$type = $args[0];
		$option = isset($this->optionsSocialMedia[$type]) ? $this->optionsSocialMedia[$type] : '';

		echo '<input type="text" id="' . $type . '" name="options_social_media[' . $type . ']" value="' . $option . '">';
	}


	/**
	 * Get the settings type from the query string
	 *
	 * @return string
	 */
	protected function getTab()
	{
		if(isset($_GET['tab']))
			return $_GET['tab'];

		return 'main';
	}

}