<?php
function my_theme_enqueue_styles() {

    $parent_style = 'storefront-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

function storefront_loaded() {
  // remove searchbar
  remove_action('storefront_header', 'storefront_product_search', 40);
  remove_action('storefront_loop_post', 'storefront_init_structured_data', 40 );

  // Remove the sorting dropdown from Woocommerce
  remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
  // Remove the result count from WooCommerce
  remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

}


function hide_page_title() {
  return false;
}

function get_product_by_sku(string $sku) {
  $id = wc_get_product_id_by_sku($sku);
  return wc_get_product($id);
}



add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
add_action( 'init', 'storefront_loaded');
add_filter( 'woocommerce_show_page_title' , 'hide_page_title');
add_filter( 'woocommerce_get_breadcrumb', 'jk_remove_breadcrumb');
  function jk_remove_breadcrumb() {
    return false;
}

// filter for custom single_product sites
function my_custom_product_template($template, $slug, $name) {

    if ($name === 'single-product' && $slug === 'content') {
        global $product;

        $terms = wp_get_post_terms( $product->get_id(), 'product_cat' );
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
                $term->name;
                $temp = locate_template(array("{$slug}-{$name}-{$term->name}.php", WC()->template_path() . "{$slug}-{$name}-{$term->name}.php"));
                if($temp) {
                  $template = $temp;
                  return $template;
                }
            }
        }
    }
    return $template;
}

function variable_slider() {

}

add_filter('wc_get_template_part', 'my_custom_product_template', 10, 3);



?>
