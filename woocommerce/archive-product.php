<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author         WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header('landing');

?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

$p1 = get_variable_product_by_sku("whapow_banana");
$p2 = get_variable_product_by_sku("whapow_passion");

$post = get_post(4);
$content = $post->post_content;
?>

<section class="w-landing w-content-box" id="w-product-overview">
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles();?>">

			<?php
/**
 * Functions hooked into storefront_header action
 *
 * @hooked storefront_skip_links                       - 0
 * @hooked storefront_social_icons                     - 10
 * @hooked storefront_site_branding                    - 20
 * @hooked storefront_secondary_navigation             - 30
 * @hooked storefront_product_search                   - 40
 * @hooked storefront_primary_navigation_wrapper       - 42
 * @hooked storefront_primary_navigation               - 50
 * @hooked storefront_header_cart                      - 60
 * @hooked storefront_primary_navigation_wrapper_close - 68
 */
remove_action('storefront_header', 'storefront_site_branding', 20);
do_action('storefront_header');?>

	</header><!-- #masthead -->

	<div class="w-headline-container">
		<h1><?php echo single_post_title("", false); ?><br/><span>ihh... ist das lecker, ahh... und gesund, ohh... nachhaltig auch noch!</span></h1>
	</div>


	<div class="w-overview-image-wrapper">
		<div class="w-overview-image-box">
			<div data-scroll-to="w-product-whapow_banana"><?php echo $p1->get_image(array(0, 700), array('class' => 'w-overview-image')); ?></div>
			<a data-scroll-to="w-product-whapow_banana" href="#"><?php echo $p1->get_title(); ?></a>
		</div>
		<div class="w-overview-image-box">
			<div data-scroll-to="w-product-whapow_passion"><?php echo $p2->get_image(array(0, 700), array('class' => 'w-overview-image')); ?></div>
			<a data-scroll-to="w-product-whapow_passion" href="#"><?php echo $p2->get_title(); ?></a>
		</div>
	</div>

	<div class="w-overview-content-wrapper">
<!--		<input type="button" value="direkt kaufen" data-scroll-to="w-product-purchase" />-->
      <a href="https://whapow.de/sprich-mit-uns/" class="button" style="margin-bottom: 10px">WHAPOW mündlich.</a>
      <p>Du möchtest lieber mit uns über WHAPOW reden? Dann gib uns Deine Telefonnummer und wir rufen Dich in den nächsten 24h zurück.</p>
	</div>
</section>


<?php echo do_shortcode('[product sku="whapow_banana"]'); ?>

<?php echo do_shortcode('[product sku="whapow_passion"]'); ?>

<?php //echo do_shortcode('[product sku="whapow_box_12"]'); ?>

<?php if (is_active_sidebar('media-echo')): ?>
	<section id="w-media-echo" class="w-content-box">
	<p>bekannt aus</p>
	<!--<p>Whapow</p>-->
	<?php dynamic_sidebar('media-echo');?>
	</section>
<?php endif;?>

<?php if (is_active_sidebar('pre-footer')): ?>
	<section class="w-content-box">
	<?php dynamic_sidebar('pre-footer');?>
	</section>
<?php endif;?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');
?>

<?php get_footer('shop');?>
