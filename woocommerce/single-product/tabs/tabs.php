<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package Estera
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$estera_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $estera_tabs ) ) : ?>

    <div class="q_tabs boxed woocommerce-tabs">
        <ul class="tabs clearfix tabs-nav">
            <?php foreach ( $estera_tabs as $estera_key => $estera_tab ) : ?>

                <li class="<?php echo esc_attr( $estera_key ); ?>_tab">
                    <a href="#tab-<?php echo esc_attr( $estera_key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $estera_key . '_tab_title', esc_html( $estera_tab['title'] ), $estera_key ) ?></a>
                </li>

            <?php endforeach; ?>
        </ul>
        <?php foreach ( $estera_tabs as $estera_key => $estera_tab ) : ?>

            <div class="panel entry-content tabs-container" id="tab-<?php echo esc_attr( $estera_key ); ?>">
                <?php call_user_func( $estera_tab['callback'], $estera_key, $estera_tab ) ?>
            </div>

        <?php endforeach; ?>
    </div>

<?php endif; ?>