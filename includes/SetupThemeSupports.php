<?php

class SetupThemeSupports {

	public function __construct()
	{
		add_theme_support('post-formats', ['gallery', 'image', 'video', 'audio']);
		add_theme_support('post-thumbnails');
	}

}