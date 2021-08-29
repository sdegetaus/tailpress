<?php

if (!defined('ABSPATH')) {
	exit;
}

// Define paths/urls
if (!defined('BB_THEME_URL')) {
	define('BB_THEME_URL', get_stylesheet_directory_uri() . '/');
}

if (!defined('BB_THEME_PATH')) {
	define('BB_THEME_PATH', get_template_directory() . '/');
}

if (!defined('BB_INCLUDES_PATH')) {
	define('BB_INCLUDES_PATH', BB_THEME_PATH . 'includes/');
}

// Includes
require BB_INCLUDES_PATH . 'class-tailpress.php';
require BB_INCLUDES_PATH . 'tailpress-functions.php';
