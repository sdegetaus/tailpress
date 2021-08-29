<?php

/*
 * Original `functions.php` from the TailPress theme. 
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup.
 */
add_action('after_setup_theme', function () {
    TailPress::instance();

    add_theme_support('title-tag');

    register_nav_menus([
        'primary' => __('Primary Menu', 'tailpress'),
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');

    add_theme_support('editor-styles');
    add_editor_style();
});

/**
 * Enqueue theme assets.
 */
add_action('wp_enqueue_scripts', function () {
    $theme = wp_get_theme();
    wp_enqueue_style(
        'tailpress',
        TailPress::instance()->mix('css/app.css'),
        [],
        $theme->get('Version')
    );
    wp_enqueue_script(
        'tailpress',
        TailPress::instance()->mix('js/app.js'),
        [],
        $theme->get('Version')
    );
});

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
add_filter(
    'nav_menu_css_class',
    function ($classes, $item, $args, $depth) {
        if (isset($args->li_class)) {
            $classes[] = $args->li_class;
        }
        if (isset($args->{"li_class_$depth"})) {
            $classes[] = $args->{"li_class_$depth"};
        }
        return $classes;
    },
    10,
    4
);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
add_filter(
    'nav_menu_submenu_css_class',
    function ($classes, $args, $depth) {
        if (isset($args->submenu_class)) {
            $classes[] = $args->submenu_class;
        }
        if (isset($args->{"submenu_class_$depth"})) {
            $classes[] = $args->{"submenu_class_$depth"};
        }
        return $classes;
    },
    10,
    3
);
