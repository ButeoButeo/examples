<style>
    .mws_product {
        float: left;
        width: 190px;
        margin-right: 15px;
    }

<?php

/*
 Plugin Name: Mia's Web Store
 Description: A bridge plugin for Web Store products
 Version:     1.0
 Author:      Andrea Njegovan
*/

/**
 * Add Settings Menu Item
 */
function mws_admin_actions() {
    add_options_page("Mia's WS Product Display", "Mia's WS Product Display", 1, "MWS_Product_Display", "mws_admin");
}

add_action('admin_menu', 'mws_admin_actions');

function mws_admin() {
  include('webstore_admin.php');
}

//Get and Display Products
function mws_get_products() {
    //Connect to Mia's Web Store Database
    $db = new wpdb(get_option('db_user'), get_option('db_pass'), get_option('db_name'), get_option('db_host'));

    //Get Values
    $store_url      = get_option('store_url');
    $img_folder     = get_option('img_folder');
    $num_products   = get_option('num_products');

    //Get Products
    $products = $db->get_results("SELECT * FROM products LIMIT ".$num_products);

    //Built Output
    $output = '';
    if ($products) {
        foreach ($products as $product) {
            $output .= '<div class="mws_product">';
            $output .= '<h3>'.$product->title.'</h3>';
            $output .= '<img src="'.$store_url.'/'.$img_folder.'/'.$product->image.'" alt="'.$product->title.'">';
            $output .= '<div class="price">'.$product->price.'</div>';
            $output .= '<div class="desc">'.wp_trim_words($product->description, 10).'</div>';
            $output .= '<a href="'.$store_url.'products/details/'.$product->id.'">Buy Now</a>';
            $output .= '</div>';
        }
    } else {
        $output .= 'No products to list';
    }

    return $output;
}

//Add Shortcode
add_shortcode('show_products', 'mws_get_products');