<?php namespace Gloudemans\Socialmedia;

use InvalidArgumentException;

class Icon {

	/**
	 * An array of supported icons
	 *
	 * @var array
	 */
	public static $supportedIcons = [
		'facebook' => [
			'default' => 'facebook',
			'square'  => 'facebook-square'
		],
		'twitter' => [
			'default' => 'twitter',
			'square'  => 'twitter-square'
		],
		'pinterest' => [
			'default' => 'pinterest',
			'square'  => 'pinterest-square'
		],
		'google' => [
			'default' => 'google-plus',
			'square'  => 'google-plus-square'
		],
		'linkedin' => [
			'default' => 'linkedin',
			'square'  => 'linkedin-square'
		],
		'tumblr' => [
			'default' => 'tumblr',
			'square'  => 'tumblr-square'
		],
		'flickr' => [
			'default' => 'flickr',
			'square'  => 'flickr'
		],
		'instagram' => [
			'default' => 'instagram',
			'square'  => 'instagram'
		],
		'github' => [
			'default' => 'github',
			'square'  => 'github-square'
		],
		'bitbucket' => [
			'default' => 'bitbucket',
			'square'  => 'bitbucket-square'
		],
		'vimeo' => [
			'default' => 'vimeo-square',
			'square'  => 'vimeo-square'
		],
		'youtube' => [
			'default' => 'youtube',
			'square'  => 'youtube-square'
		],
	];

	/**
	 * Get an icon by its key and of the given type
	 *
	 * @param string $icon
	 * @param string $type
	 * @return mixed
	 */
	public static function get($icon, $type = 'default')
	{
		if( ! in_array($type, ['default', 'square']))
			throw new InvalidArgumentException('The type should either be "default" or "square".');

		return self::$supportedIcons[$icon]['default'];
	}

	/**
	 * Get an array of all icons for the given type
	 *
	 * @param string $type
	 * @return array
	 */
	public static function getAll($type = 'default')
	{
		if( ! in_array($type, ['default', 'square']))
			throw new InvalidArgumentException('The type should either be "default" or "square".');

		$icons = [];

		foreach(self::$supportedIcons as $key => $icon)
		{
			$icons[$key] = $icon[$type];
		}

		return $icons;
	}

}