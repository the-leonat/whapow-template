<?php

function my_theme_enqueue_styles()
{

    $parent_style = 'storefront-style';
    wp_enqueue_style($parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    wp_enqueue_style('storefront-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    wp_enqueue_script('storefront-child-script',
        get_stylesheet_directory_uri() . '/js/script.js',
        array(),
        1.0,
        true
    );

    wp_register_script('typedjs',
        'https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.6/typed.min.js',
        array('jquery'),
        1.0,
        true
    );

    wp_enqueue_script('typedjs');

}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

// CUSTOMIZE STOREFRONT

function storefront_loaded()
{
    // remove searchbar
    remove_action('storefront_header', 'storefront_product_search', 40);
    remove_action('storefront_loop_post', 'storefront_init_structured_data', 40);
    remove_action('storefront_footer', 'storefront_credit', 20);

    // Remove the sorting dropdown from Woocommerce
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    // Remove the result count from WooCommerce
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

    remove_action('storefront_header', 0);

    // function wpcustom_deregister_scripts_and_styles(){
    //     wp_deregister_style('storefront-woocommerce-style');
    //     wp_deregister_style('storefront-style');
    // }
    // add_action( 'wp_print_styles', 'wpcustom_deregister_scripts_and_styles', 100 );
}

function hide_page_title()
{
    return false;
}

function get_product_by_sku(string $sku)
{
    $id = wc_get_product_id_by_sku($sku);
    return wc_get_product($id);
}

function get_variable_product_by_sku(string $sku)
{
    $id = wc_get_product_id_by_sku($sku);
    return new WC_Product_Variable($id);
}

// REMOVE BREADCUMB

add_action('init', 'storefront_loaded');
add_filter('woocommerce_show_page_title', 'hide_page_title');
add_filter('woocommerce_get_breadcrumb', 'jk_remove_breadcrumb');
function jk_remove_breadcrumb()
{
    return false;
}

// CUSTOM TEMPLATE FOR BOX AND WHAPOW

// filter for custom single_product sites
function my_custom_product_template($template, $slug, $name)
{

    if (($name === 'product' || $name === 'single-product') && $slug === 'content') {
        global $product;

        $terms = wp_get_post_terms($product->get_id(), 'product_cat');
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $term->name;
                $temp = locate_template(array("{$slug}-{$name}-{$term->name}.php", WC()->template_path() . "{$slug}-{$name}-{$term->name}.php"));
                if ($temp) {
                    $template = $temp;
                    return $template;
                }
            }
        }
    }
    return $template;
}

add_filter('wc_get_template_part', 'my_custom_product_template', 10, 3);

// CHANGE STRINGS
add_filter('user_can_richedit', '__return_false', 50);

// VARATIONS

function json_get_variations($product)
{
    $variations = $product->get_variation_attributes();
    return json_encode(reset($variations));
}

function json_get_variations_by_sku($sku)
{
    $p1 = new WC_Product_Variable(wc_get_product_id_by_sku($sku));
    $variations = $p1->get_variation_attributes();
    return json_encode(reset($variations));
}

function js_set_variation_constant($product_array)
{
    $variations_list = array();
    foreach ($product_array as $key => $product) {
        $variations = $product->get_variation_attributes();
        $variations = reset($variations);
        $variations_list[$product->get_id()] = $variations;
    }

    $jsonString = json_encode($variations_list);
    echo "<script>";
    echo "var VARIATIONS = " . $jsonString . ";";
    echo "</script>";

}

function js_set_pagestate()
{
    global $product;

    echo "<script>";
    echo "initPageState('" . $product->get_sku() . "','" . "s" . "');";
    echo "</script>";
}

//widget area

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

function whapow_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Bekannt aus',
            'id' => 'media-echo',
            'description' => 'area to display media reception stuff',
            'before_widget' => '<div class="w-logo-container">',
            'after_widget' => '</div>',
            'before_title' => '<h1>',
            'after_title' => '</h1>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Pre Footer',
            'id' => 'pre-footer',
            'description' => 'area to add additional content',
            'before_widget' => '<div class="w-pre-footer-container">',
            'after_widget' => '</div>',
            'before_title' => '<h1>',
            'after_title' => '</h1>',
        )
    );
}
add_action('widgets_init', 'whapow_widgets_init');