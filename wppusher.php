<?php

return [

	// Each string will be passed to the shell as a command.
	'commands' => [
		'composer install --no-dev --no-interaction',
	],

	// Defaults to true and is not required.
	// If set to false, installing and update can take a long time
	// and may seem like it's 'hanging'.
	// 'async' => false,

	// Defaults to true, meaning that if one command fails,
	// the following commands won't be executed.
	// 'halt_on_fail' => false,

];