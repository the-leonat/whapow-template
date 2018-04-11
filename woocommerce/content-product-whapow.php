<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	global $product;
?>

<section class="w-content-box w-content-box-seacon" id="w-product-<?php echo $product->get_sku();?>">
	<h1 class="w-product-title"><?php echo $product->get_title(); ?></h1>
	<div class="w-product-ingredients">
				<?php echo $product->get_short_description(); ?>
	</div>
	<div class="w-product-image-wrapper">
		<?php echo $product->get_image(array(0,700), array( 'class' => 'w-product-image' )); ?>
	</div>

	<h1 class="w-product-subheadline"><? echo $product->get_attribute( 'sub_headline' ) ?></h1>
	<p class="w-product-description">
		<?php echo $product->get_description(); ?>
	</p>

</section>
<?php
