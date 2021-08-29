<?php

/*
 * Reset, unset or set WordPress default features.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add svg as an item for uploading
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

/**
 * Return generic message when getting an incorrect value at login.
 * Used to avoid specific error messages (i.e. incorrect password).
 */
add_filter('login_errors', function () {
    return 'Incorrect information';
});

/**
 * Remove REST API for non-logged-in users.
 */
add_filter('rest_authentication_errors', function ($result) {
    if (!is_user_logged_in()) {
        return new WP_Error(
            'rest_not_logged_in',
            'You are not currently logged in.',
            ['status' => 401]
        );
    }
    if (!empty($result)) {
        return $result;
    }
    return $result;
});

/**
 * Disable WordPress unnecesary things
 */
// add_action('init', function () {
//     // remove wordpress version from frontend
//     remove_action('wp_head', 'wp_generator');
//     add_filter('the_generator', function () {
//         return '';
//     });
//     // remove emojis
//     remove_action('wp_head', 'print_emoji_detection_script', 7);
//     remove_action('admin_print_scripts', 'print_emoji_detection_script');
//     remove_action('wp_print_styles', 'print_emoji_styles');
//     remove_action('admin_print_styles', 'print_emoji_styles');
//     remove_filter('the_content_feed', 'wp_staticize_emoji');
//     remove_filter('comment_text_rss', 'wp_staticize_emoji');
//     remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
//     add_filter('tiny_mce_plugins', function ($plugins) {
//         if (is_array($plugins)) {
//             return array_diff($plugins, array('wpemoji'));
//         } else {
//             return array();
//         }
//     });
//     add_filter('wp_resource_hints', function ($urls, $relation_type) {
//         if ('dns-prefetch' == $relation_type) {
//             /** This filter is documented in wp-includes/formatting.php */
//             $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
//             $urls = array_diff($urls, array($emoji_svg_url));
//         }
//         return $urls;
//     }, 10, 2);
//     // remove xmlrpc (could have security issues)
//     add_filter('xmlrpc_enabled', '__return_false');
//     remove_action('wp_head', 'rsd_link');
//     // remove Windows Live Writer Manifest Link	
//     remove_action('wp_head', 'wlwmanifest_link');
//     // remove feed head links
//     remove_action('wp_head', 'feed_links', 2);
//     remove_action('wp_head', 'feed_links_extra', 3);
//     // remove JSON *links* at head
//     remove_action('wp_head', 'rest_output_link_wp_head');
//     remove_action('wp_head', 'wp_oembed_add_discovery_links');
//     remove_action('template_redirect', 'rest_output_link_header', 11);
// });
