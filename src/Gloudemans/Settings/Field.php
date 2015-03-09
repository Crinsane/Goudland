<?php namespace Gloudemans\Settings;

final class Field {

	/**
	 * Render a text field
	 *
	 * @param array $args
	 * @return void
	 */
	public static function text($args)
	{
		self::input($args, 'text');
	}

	/**
	 * Render a color picker field
	 *
	 * @param array $args
	 * @return void
	 */
	public static function color($args)
	{
		self::input($args, 'color', 'color-field');
	}

	/**
	 * Render a color picker field
	 *
	 * @param array $args
	 * @return void
	 */
	public static function url($args)
	{
		self::input($args, 'url');
	}

	/**
	 * Render a checkbox
	 *
	 * @param array $args
	 * @return void
	 */
	public static function checkbox($args)
	{
		$options = $args[0];
		$name = $args[1];

		$value = get_option($options);

		echo '<input type="checkbox" name="' . $options . '[' . $name . ']" id="' . $name . '" value="1" ' . checked($value[$name], 1, false) . '>';
	}

	/**
	 * Render an editor field
	 *
	 * @param array $args
	 * @return void
	 */
	public static function editor($args)
	{
		$optionGroup = $args[0];
		$optionName = $args[1];
		$settings = $args[2];

		$value = get_option($optionGroup);

		wp_editor($value[$optionName], $optionName, $settings);
	}

	public static function media($args)
	{
		wp_enqueue_media();
		wp_enqueue_script('media-setting', get_template_directory_uri() . '/assets/js/media-setting.js', ['thickbox', 'media-upload']);

		echo '<input type="button" class="button media-setting" value="Selecteer">';
		self::input($args, 'text');
	}

	/**
	 * Render a select box
	 *
	 * @param array $args
	 * @return void
	 */
	public static function select($args)
	{
		$optionGroup = $args[0];
		$optionName = $args[1];
		$options = $args[2];

		$value = get_option($optionGroup);

		echo '<select name="' . $optionGroup . '[' . $optionName . ']" id="' . $optionName . '">';

		foreach($options as $key => $option)
		{
			echo '<option value="' . $key . '" ' . selected($value[$optionName], $key, false) . '>' . $option . '</option>';
		}

		echo '</select>';
	}

	/**
	 * Render an input field of the supplied type
	 *
	 * @param array        $args
	 * @param string       $type
	 * @param null|string  $extraClass
	 */
	private static function input($args, $type = 'text', $extraClass = null)
	{
		$options = $args[0];
		$name    = $args[1];

		$value = get_option($options);

		echo '<input type="' . $type . '" name="' . $options . '[' . $name . ']" id="' . $name . '" value="' . $value[ $name ] . '" class="regular-text ' . $extraClass . '">';
	}

}