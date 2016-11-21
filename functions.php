<?php

/**
 * Start the session
 */
session_start();

/**
 * Include libraries
 */
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/TwitterAPIExchange.php';
require_once __DIR__ . '/lib/color.php';

/**
 * Remove the WP meta tag
 */
remove_action('wp_head', 'wp_generator');

/**
 * Setup the theme
 */
$setup = new \Gloudemans\Theme\ThemeSetup();
$setup->theme();
$setup->settings();
//$setup->products();
$setup->slideshows();
$setup->testimonials();

add_action('admin_head', function () {
    echo '<style>
		#dfiFeaturedMetaBox-2 .inside img {
			background: #414141;
        }
	</style>';
});

add_filter('manage_brand_posts_columns', function ($columns) {
        $front = array_slice($columns, 0, 2);
		$end = array_slice($columns, 2);
		$new = ['website' => 'Website', 'onfront' => 'Op voorpagina'];

		return $front + $new + $end;
});

add_action('manage_brand_posts_custom_column', function ($column, $post_id) {
    switch ($column) {
        case 'website':
            echo get_post_meta($post_id , 'website' , true);
            break;

        case 'onfront':
            echo get_post_meta($post_id , 'onfront' , true) == 1 ? 'Ja' : '';
            break;
    }
}, 10, 2 );

/**
 * Add the fields to REST API responses for posts read and write
 */
add_action( 'rest_api_init', 'slug_register_fields' );
function slug_register_fields()
{
    $fields = [
        'body',
        'fuel',
        'transmission',
        'vat',
        'basecolor',
        'buildyear',
        'price',
        'condition',
    ];

    foreach ($fields as $field) {
        register_rest_field( 'machine',
            $field,
            [
                'get_callback'    => 'slug_get_meta',
                'update_callback' => 'slug_update_meta',
                'schema'          => null,
            ]
        );
    }
}
/**
 * Handler for getting custom field data.
 *
 * @since 0.1.0
 *
 * @param array $object The object from the response
 * @param string $field_name Name of field
 * @param WP_REST_Request $request Current request
 *
 * @return mixed
 */
function slug_get_meta( $object, $field_name, $request )
{
    return get_post_meta( $object[ 'id' ], $field_name );
}

/**
 * Handler for updating custom field data.
 *
 * @since 0.1.0
 *
 * @param mixed $value The value of the field
 * @param object $object The object from the response
 * @param string $field_name Name of field
 *
 * @return bool|int
 */
function slug_update_meta( $value, $object, $field_name )
{
    if ( ! is_string( $value ) ) {
        return;
    }

    return update_post_meta( $object->ID, $field_name, strip_tags( $value ) );
}