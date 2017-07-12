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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>


	<?php
		$p1 = get_product_by_sku("whapow_passion");
		$p2 = get_product_by_sku("whapow_banana");
	?>

	<div class="whapow-product-row">
		<div id="whapow-passion" class="whapow-product">
				<div class="whapow-content-row">
					<h2 class="whapow-product-title"><?php echo $p1->get_title(); ?></h2>
					<div class="whapow-product-description"><?php echo $p1->get_short_description(); ?></div>
					<a href="<?php echo $p1->get_permalink(); ?>" class="whapow-cta">mehr erfahren</a>
				</div>
				<div class="whapow-image-row">
					<a href="<?php echo $p1->get_permalink(); ?>">
						<?php echo $p1->get_image(array(0,700), array( 'class' => 'whapow-product-image' )); ?>
					</a>
					<div class="whapow-image-background"></div>

				</div>
		</div>
	</div>

	<div class="whapow-product-row">
		<div id="whapow-banana" class="whapow-product">

				<div class="whapow-image-row">
					<a href="<?php echo $p2->get_permalink(); ?>">
						<?php echo $p2->get_image(array(0,700), array( 'class' => 'whapow-product-image' )); ?>
					</a>
					<div class="whapow-image-background"></div>
				</div>
				<div class="whapow-content-row">
					<h2 class="whapow-product-title"><?php echo $p2->get_title(); ?></h2>
					<div class="whapow-product-description"><?php echo $p2->get_short_description(); ?></div>
					<a href="<?php echo $p2->get_permalink(); ?>" class="whapow-cta">mehr erfahren</a>

				</div>
		</div>
	</div>

	<script>
		jQuery("#whapow-banana .whapow-cta").hover(function() {
			console.log("jeah");
			jQuery("#whapow-banana").addClass("hover");
			jQuery(".home").css("background-color", "rgb(255,224,0)").css("background-position", "48% 0%");;
		}, function() {
			jQuery("#whapow-banana").removeClass("hover");
			jQuery(".home").css("background-color", "rgb(235,235,235)").css("background-position", "50% 0%");;
		});

		jQuery("#whapow-passion .whapow-cta").hover(function() {
			console.log("jeah");
			jQuery("#whapow-passion").addClass("hover");
			jQuery(".home").css("background-color", "rgb(255,0,224)").css("background-position", "52% 0%");
		}, function() {
			jQuery("#whapow-passion").removeClass("hover");
			jQuery(".home").css("background-color", "rgb(235,235,235)").css("background-position", "50% 0%");;

		});
	</script>


	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' ); ?>
