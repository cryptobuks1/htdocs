<?php

function theme_cart_container_fragments_filter($fragment) {
    ob_start();
    theme_cart();
    $fragment['.bd-cartcontainer-1'] = ob_get_clean();
    return $fragment;
}
add_filter('add_to_cart_fragments', 'theme_cart_container_fragments_filter');
add_filter('add_to_cart_fragments', 'theme_add_to_cart_fragments', 20);


function theme_cart() {
    global $woocommerce;
    if ($woocommerce->cart->cart_contents_count > 0):
        ?><div class="data-control-id-3518 bd-cartcontainer-1">
    <?php
    global $woocommerce, $product;
    if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ){
        ?><div class="data-control-id-768880 bd-grid-13">
           <div class="container-fluid">
            <div class="separated-grid row"><?php
            $current_product = $product; // save current product
            foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ){
                $product = $cart_item['data']; // set cart product
                // Only display if allowed
                if ( ! apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) || ! $product->exists() || $cart_item['quantity'] == 0 )
                    continue;
                $product_price = get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' || $woocommerce->customer->is_vat_exempt() ? $product->get_price_excluding_tax() : $product->get_price();
                $product_price = apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $cart_item, $cart_item_key );
                $product_view = array();
                $product_view['link']  = get_permalink( $cart_item['product_id'] );
                $product_view['title'] = apply_filters('woocommerce_widget_cart_product_title', $product->get_title(), $product );
                $product_view['price'] = $product_price;
                $product_view['image']  = $product->get_image();
                ?>
                <div class="separated-item-1 col-md-24 list">
    <div class="data-control-id-139 bd-griditem-1"><div class="data-control-id-128 bd-layoutcontainer-1">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-122 
 col-md-6">
    <div class="bd-layoutcolumn-1"><div class="bd-vertical-align-wrapper"><a class="data-control-id-67 bd-productimage-1" href="<?php echo $product_view['link']; ?>"><?php theme_product_image($product_view, 'data-control-id-66 bd-imagestyles'); ?></a></div></div>
</div>
	
		<div class="data-control-id-124 
 col-md-14">
    <div class="bd-layoutcolumn-2"><div class="bd-vertical-align-wrapper"><?php if ( isset($product_view['link']) && isset($product_view['title']) ){ ?><div class="data-control-id-68 bd-producttitle-2"><a href="<?php echo $product_view['link']; ?>"><?php echo $product_view['title']; ?></a></div><?php } ?>
	
		<div class="data-control-id-104 bd-cartprice-1">
    <?php echo $cart_item['quantity']; ?> x <div class="data-control-id-103 bd-pricetext-3">
    <?php
        if (isset($product_view['price'])){
            echo $product_view['price'];
        }
    ?>
</div>
</div></div></div>
</div>
	
		<div class="data-control-id-126 
 col-md-4">
    <div class="bd-layoutcolumn-3"><div class="bd-vertical-align-wrapper">
	
		<?php
    global $woocommerce;
    $href = $woocommerce->cart->get_remove_url($cart_item_key) . '&_wp_http_referer=' . urlencode($woocommerce->cart->get_cart_url());
?>
<a class="data-control-id-120 bd-itemremovelink-1" href="<?php echo $href; ?>">
    <span class="data-control-id-119 bd-icon-11"></span>
</a></div></div>
</div>
            </div>
        </div>
    </div>
</div></div>
</div>
                <?php
            }
            $product = $current_product; // restore current product
        ?></div></div></div><?php
    }
?>
	
		<?php global $woocommerce; ?>
<div class="data-control-id-181 bd-pricetext-4">
    <span class="data-control-id-148 bd-label-4">Total:</span>
        <span class="data-control-id-180 bd-container-6 bd-tagstyles">
            <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
        </span>
</div>
	
		<div class="data-control-id-198 bd-layoutcontainer-2">
    <div class="bd-container-inner">
        <div class="container-fluid">
            <div class="row
                
                
 bd-row-align-top
                
                ">
                <div class="data-control-id-194 
 col-md-7">
    <div class="bd-layoutcolumn-4"><div class="bd-vertical-align-wrapper"><?php global $woocommerce; ?>
<a href="<?php echo theme_woocommerce_enabled() ? $woocommerce->cart->get_cart_url() : ''; ?>" class="data-control-id-186 bd-button">View</a></div></div>
</div>
	
		<div class="data-control-id-196 
 col-md-17">
    <div class="bd-layoutcolumn-5"><div class="bd-vertical-align-wrapper"><?php global $woocommerce; ?>
<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="data-control-id-191 bd-button">Proceed to Checkout</a></div></div>
</div>
            </div>
        </div>
    </div>
</div>
</div><?php
    else:
        echo '<div class="data-control-id-3518 bd-cartcontainer-1"><span>' . __('You have no items in your shopping cart.', 'woocommerce') . '</span></div>';
    endif;
}

class Theme_WooCommerce_Widget_Cart extends WP_Widget {

    var $woo_widget_cssclass;
    var $woo_widget_description;
    var $woo_widget_idbase;
    var $woo_widget_name;

    function Theme_WooCommerce_Widget_Cart() {

        /* Widget variable settings. */
        $this->woo_widget_cssclass 		= 'widget_shopping_cart';
        $this->woo_widget_description 	= __( "Display the user's Cart in the sidebar.", 'woocommerce' );
        $this->woo_widget_idbase 		= 'woocommerce_widget_cart';
        $this->woo_widget_name 			= __( 'WooCommerce Cart', 'woocommerce' );

        /* Widget settings. */
        $widget_ops = array( 'classname' => $this->woo_widget_cssclass, 'description' => $this->woo_widget_description );

        /* Create the widget. */
        $this->WP_Widget( 'shopping_cart', $this->woo_widget_name, $widget_ops );
    }

    function widget( $args, $instance ) {
        global $woocommerce;

        extract( $args );

        if ( is_cart() || is_checkout() ) return;

        $title = apply_filters('widget_title', empty( $instance['title'] ) ? __('Cart', 'woocommerce') : $instance['title'], $instance, $this->id_base );
        $hide_if_empty = empty( $instance['hide_if_empty'] )  ? 0 : 1;
        $show = $woocommerce->cart->cart_contents_count != 0 || !$hide_if_empty;

        echo $before_widget;
        if ($show) {
            if ($title)
                echo $before_title . $title . $after_title;
            theme_cart();
        }
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance['title'] = $new_instance['title'];
        $instance['hide_if_empty'] = $new_instance['hide_if_empty'];
        return $instance;
    }

    function form( $instance ) {
        $hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'woocommerce') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

        <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_if_empty') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_if_empty') ); ?>"<?php checked( $hide_if_empty ); ?> />
            <label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php _e( 'Hide if cart is empty', 'woocommerce' ); ?></label></p>
    <?php
    }

}

// init widget
function themeWidgetCartInit() {
    if (theme_woocommerce_enabled()) {
        unregister_widget('WC_Widget_Cart');
        unregister_widget('WooCommerce_Widget_Cart');
        register_widget('Theme_WooCommerce_Widget_Cart');
    }
}

add_action('widgets_init', 'themeWidgetCartInit');

?>