<?php
/**
 * Plugin Name: Simple Product Bundle
 * Author: Servizi 3.0
 * Version: 1.9.1
 * Description: Seleziona se promuovere dei prodotti correlati oppure di creare una promozione
 * Text Domain: bundle-servizitrepuntozero-domain
 * Domain Path: bundle-servizitrepuntozero/languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

require_once plugin_dir_path(__FILE__) . 'includes/bundle-free-structure.php';
require_once plugin_dir_path(__FILE__) . 'includes/bundle-free-admin.php';
require_once plugin_dir_path(__FILE__) . 'includes/bundle-free-functions.php';

//Enqueue styles and js
function spb_enqueue_scripts_styles()
{
    wp_enqueue_style('free-bundle-servizitrepuntozero-style', plugins_url('/css/bundle-servizitrepuntozero-style.css', __FILE__));
    wp_enqueue_script('free-bundle-servizitrepuntozero-main', plugins_url('/js/bundle-servizitrepuntozero-main.js', __FILE__), array('jquery'));
    wp_localize_script('free-bundle-servizitrepuntozero-main', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'spb_enqueue_scripts_styles');

function spb_admin_enqueue_scripts_styles()
{
    wp_enqueue_style('free-bundle-servizitrepuntozero-style', plugins_url('/css/bundle-servizitrepuntozero-style.css', __FILE__));
    wp_enqueue_script('free-admin-bundle-servizitrepuntozero-main', plugins_url('/js/admin_js/admin-bundle-servizitrepuntozero-main.js', __FILE__), array('jquery'));
    wp_localize_script('free-admin-bundle-servizitrepuntozero-main', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('admin_enqueue_scripts', 'spb_admin_enqueue_scripts_styles');

// PO and MO files..
function spb_bundle_text_domain()
{
    load_plugin_textdomain('bundle-servizitrepuntozero-domain', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'spb_bundle_text_domain');

//Show the Create Offer on the product data tabs
function spb_display_bundle_product_tabs($tabs)
{
    $tabs['Bundle'] = array(
        'label' => __('Create Offer', 'bundle-servizitrepuntozero-domain'),
        'target' => 'bundle_servizitrepuntozero',
        'class' => array('show_if_simple', 'show_if_variable'),
    );
    return $tabs;
}
add_filter('woocommerce_product_data_tabs', 'spb_display_bundle_product_tabs');
?>
