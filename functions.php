<?php
if (!defined('ABSPATH')) exit;

function dmz_pumps_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    register_nav_menus([
        'primary' => __('Primary Menu', 'dmz-pumps'),
        'footer'  => __('Footer Menu', 'dmz-pumps'),
    ]);
}
add_action('after_setup_theme', 'dmz_pumps_setup');

function dmz_pumps_assets() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('dmz-pumps-style', get_stylesheet_uri(), [], $version);
    wp_enqueue_style('dmz-pumps-featured-products', get_template_directory_uri() . '/featured-products.css', ['dmz-pumps-style'], filemtime(get_template_directory() . '/featured-products.css'));

    if (is_front_page()) {
        wp_enqueue_style('dmz-pumps-home', get_template_directory_uri() . '/home.css', ['dmz-pumps-style'], filemtime(get_template_directory() . '/home.css'));
        wp_enqueue_script('dmz-pumps-home', get_template_directory_uri() . '/assets/js/dmz-home.js', [], filemtime(get_template_directory() . '/assets/js/dmz-home.js'), true);
    }
}
add_action('wp_enqueue_scripts', 'dmz_pumps_assets');

function dmz_shop_url() {
    if (class_exists('WooCommerce')) return wc_get_page_permalink('shop');
    return home_url('/');
}

function dmz_cart_url() {
    if (class_exists('WooCommerce')) return wc_get_cart_url();
    return home_url('/');
}

function dmz_page_url($slug) {
    $page = get_page_by_path($slug);
    return $page ? get_permalink($page) : home_url('/');
}

function dmz_product_category_url($slug) {
    if (!taxonomy_exists('product_cat')) return dmz_shop_url();
    $term = get_term_by('slug', $slug, 'product_cat');
    if ($term && !is_wp_error($term)) {
        $url = get_term_link($term);
        if (!is_wp_error($url)) return $url;
    }
    return dmz_shop_url();
}
