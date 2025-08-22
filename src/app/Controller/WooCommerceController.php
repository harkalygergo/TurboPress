<?php

namespace TurboPress\Controller;

class WooCommerceController extends TurboPressController
{
    public function init()
    {
        if ( !is_admin() ) {
            add_action( 'wp', [$this, 'woo_product_gallery_lightbox'], 99 );
        }
    }

    public function woo_product_gallery_lightbox()
    {
        if ($this->settings->getPluginOptions()['woo_lightbox']) {
            add_theme_support( 'wc-product-gallery-lightbox' );
        }
    }
}
