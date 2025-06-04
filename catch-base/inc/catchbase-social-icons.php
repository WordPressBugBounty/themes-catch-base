<?php
/**
 * The template for displaying Social Icons
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( ! function_exists( 'catchbase_get_social_icons' ) ) :
/**
 * Generate social icons.
 *
 * @since Catch Base 1.0
 */
function catchbase_get_social_icons(){
	if ( ( !$output = get_transient( 'catchbase_social_icons' ) ) ) {
		$output	= '';

		$options 	= catchbase_get_theme_options(); // Get options

		//Pre defined Social Icons Link Start
		$pre_def_social_icons 	=	catchbase_get_social_icons_list();

			foreach ($pre_def_social_icons as $key => $item) {
				if (isset($options[$key]) && '' != $options[$key]) {
					$value = $options[$key];

					if (
						'email_link' == $key
						|| 'website_link' == $key
						|| 'phone_link' == $key
						|| 'handset_link' == $key
						|| 'feed_link' == $key
						|| 'mobile_link' == $key
						|| 'cart_link' == $key
						|| 'cart_link' == $key
						|| 'cloud_link' == $key
						|| 'link_link' == $key
					) {
						$output .= '<a class="font-awesome fa-solid fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_attr($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					} else {
						$output .= '<a class="font-awesome fa-brands fa-' . sanitize_key($item['fa_class']) . '" target="_blank" title="' . esc_attr($item['label']) . '" href="' . esc_url($value) . '"><span class="screen-reader-text">' . esc_attr($item['label']) . '</span> </a>';
					}
				}
			}
			//Pre defined Social Icons Link End

			//Custom Social Icons Link End
			set_transient( 'catchbase_social_icons', $output, 86940 );
	}
	return $output;
} // catchbase_get_social_icons
endif;
