<?php
/**
 * Setup Theme
 */
require_once get_template_directory() . '/inc/main/theme-setup.php';

/**
 * Register Styles and Scripts
 */
require_once get_template_directory() . '/inc/main/reg-scripts.php';

/**
 * Register Widget areas
 */
require_once get_template_directory() . '/inc/main/reg-widget.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Register Custom Navigation Walker
 */
require get_template_directory() . '/inc/main/breadcrumbs.php';
/**
 * Styles from customizer
 */
require get_template_directory() . '/inc/main/hanson-styles.php';

/**
 * Load hanson Functions.
 */
require get_template_directory() . '/inc/main/hanson-functions.php';

/**
 * WooCommerce Integration
 */
require get_template_directory() . '/inc/main/woocommerce-functions.php';

/**
 * Add hansonbiz Plugins.
 */
require get_template_directory() . '/inc/hanson_add_plugin.php';

