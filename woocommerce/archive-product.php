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

	<div class="w-content-box" id="w-product-overview"></div>

	<div class="w-content-box" id="w-product-banana"></div>

	<div class="w-content-box" id="w-product-passion"></div>

	<div class="w-content-box" id="w-product-purchase">

		<!-- Selector -->
		<h4><span>Wie viel Whapow möchtest du haben?</span></h4>
		<div class="w-box-size-wrapper">
			<!-- 12 -->
			<div class="w-box-size-selector">
				<div class="w-box-size">
					<span class="w-size">12</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					35,88€
				</span>
				<span class="w-price-meta">
					+ 4,40€ Versand
				</span>
				<input class="w-button" type="button" value="Grösse wählen" data-size="12" onclick="updateButton(this)" />
			</div>

			<!-- 24 -->
			<div class="w-box-size-selector">
				<div class="w-box-size">
					<span class="w-size">24</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					71,23€
				</span>
				<span class="w-price-meta">
					versandkostenfrei
				</span>
				<input class="w-button" type="button" value="Grösse wählen" data-size="24" onclick="updateButton(this)" />
			</div>

			<!-- 36 -->
			<div class="w-box-size-selector">
				<div class="w-box-size">
					<span class="w-size">36</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					100,88€
				</span>
				<span class="w-price-meta">
					versandkostenfrei
				</span>
				<input class="w-button" type="button" value="Grösse wählen" data-size="36" onclick="updateButton(this)" />
			</div>
		</div>

		<!-- Slider -->
		<h4><span>Welche Verteilung möchtest du haben?</span></h4>

		<svg id="box" class="w-box" data-size="36" data-dist="20" transform="">
			<g transform="translate(2,0),scale(0.75)">
			<g transform="translate(25, 20)">
				<circle class="w-icon" cx="143.5" cy="360.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="360.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="360.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="360.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="317.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="317.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="317.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="317.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="274.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="274.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="274.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="274.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="230.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="230.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="230.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="230.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="187.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="187.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="187.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="187.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="144.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="144.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="144.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="144.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="100.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="100.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="100.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="100.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="57.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="57.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="57.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="57.5" r="14.5"></circle>
				<circle class="w-icon" cx="143.5" cy="14.5" r="14.5"></circle>
				<circle class="w-icon" cx="100.5" cy="14.5" r="14.5"></circle>
				<circle class="w-icon" cx="57.5" cy="14.5" r="14.5"></circle>
				<circle class="w-icon" cx="14.5" cy="14.5" r="14.5"></circle>
		</g>
		<polyline class="w-box-outline-36" stroke="#000000" stroke-width="2" fill="none" points="0 8.50008716 7.66612653 408.831334 194.782001 410.069532 201.507871 8.50008716 234.519462 0.268445839 225.951893 385.927193 194.782001 410.069532"></polyline>
		<polyline class="w-box-outline-24" stroke="#000000" stroke-width="2" fill="none" points="0 8.92813352 7.66612653 278.236579 194.782001 279.069532 201.507871 8.92813352 234.519462 0.627168504 225.951893 255.556511 194.782001 279.069532"></polyline>
		<polyline class="w-box-outline-12" stroke="#000000" stroke-width="2" fill="none" points="0 8.90533166 7.66612653 149.634267 194.782001 150.069532 201.507871 8.90533166 234.519462 0.38715302 225.951893 125.763841 194.782001 150.069532"></polyline>
	</g>

		</svg>


		<div class="w-slider-wrapper">
			<span class="w-slider-label w-slider-label-left"><span data-dist-value-banana>6x</span> Banane + Rohkakao</span>
			<div  class="w-slider"><input id="slider" type="range" step="1" onInput="updateSlider(this.value)" value="50" /></div>
			<span class="w-slider-label w-slider-label-right"><span data-dist-value-passion>6x</span> Passionsfrucht + Mango</span>

		</div>

		<script>
			function updateSlider(value) {
				var slider = document.querySelector("#slider");
				if(value == undefined) {
					value = slider.value;
					console.log(value);
				}


				var box = document.querySelector("#box");
				var labelBanana = document.querySelector("span[data-dist-value-banana]");
				var labelPassion = document.querySelector("span[data-dist-value-passion]");
				var boxSize = box.getAttribute("data-size");

				var newValue = Math.round( boxSize * (value / 100) * 0.5) / 0.5;

				labelBanana.innerHTML = (boxSize - newValue) + "x";
				labelPassion.innerHTML = newValue + "x";

				box.setAttribute("data-dist", newValue);

			}

			function updateButton(elem) {
				var newSize = elem.getAttribute("data-size");
				var box = document.querySelector("#box");

				box.setAttribute("data-size", newSize);
				updateSlider();
			}
		</script>

	</div>


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
