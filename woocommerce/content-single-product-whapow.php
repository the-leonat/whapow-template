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
		$p12 = get_variable_product_by_sku("whapow_box_12");
		$p24 = get_variable_product_by_sku("whapow_box_24");
		$p36 = get_variable_product_by_sku("whapow_box_36");
	?>

	<?php js_set_variation_constant(array($p12, $p24, $p36 ) ); ?>

	<div class="w-content-box" id="w-product-overview"></div>

	<div class="w-content-box" id="w-product-banana"></div>

	<div class="w-content-box" id="w-product-passion">
		<div class="w-type-wrapper">
			
		</div>
	</div>

	<div class="w-content-box" id="w-product-purchase">

		<!-- Selector -->
		<h4><span>Wie viel Whapow möchtest du haben?</span></h4>
		<div class="w-box-size-wrapper">
			<!-- 12 -->
			<div class="w-box-size-selector" data-personalize data-id="<?php echo $p12->get_id() ?>" data-size="12">
				<div class="w-box-size" onclick="updateButton(this)">
					<span class="w-size">12</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					<?php echo $p12->get_variation_regular_price(); ?>€
				</span>
				<span class="w-price-meta">
					+ 4,40€ Versand
				</span>
				<input class="w-button" type="button" value="Grösse wählen" onclick="updateButton(this)" />
				<span class="w-selected" data-personalize-items="klein aber fein!|klasse!|ausgewählt!">ausgewählt</span>
			</div>

			<!-- 24 -->
			<div class="w-box-size-selector" data-personalize data-id="<?php echo $p24->get_id() ?>" data-size="24" >
				<div class="w-box-size" onclick="updateButton(this)">
					<span class="w-size">24</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					<?php echo $p24->get_variation_regular_price(); ?>€
				</span>
				<span class="w-price-meta">
					versandkostenfrei
				</span>
				<input class="w-button" type="button" value="Grösse wählen" onclick="updateButton(this)" />
				<span class="w-selected" data-personalize-items="super.|klasse!|alles klar :)|ausgewählt!">alles klar!</span>
			</div>

			<!-- 36 -->
			<div class="w-box-size-selector" data-personalize data-id="<?php echo $p36->get_id() ?>" data-size="36" >
				<div class="w-box-size" onclick="updateButton(this)">
					<span class="w-size">36</span>
					<span class="w-size-label">Whapow</span>
				</div>
				<span class="w-price">
					<?php echo $p36->get_variation_regular_price(); ?>€
				</span>
				<span class="w-price-meta">
					versandkostenfrei
				</span>
				<input class="w-button" type="button" value="Grösse wählen" onclick="updateButton(this)" />
				<span class="w-selected" data-personalize-items="Großartig.|Big Time!|Die Volle Dröhnung!|ausgewählt!">ausgewählt</span>

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
			<span class="w-slider-label w-slider-label-left"><span data-dist-value-banana>18x</span> Banane + Rohkakao</span>
			<div  class="w-slider"><input id="slider" type="range" step="1" onInput="updateSlider(this.value)" value="50" /></div>
			<span class="w-slider-label w-slider-label-right"><span data-dist-value-passion>18x</span> Passionsfrucht + Mango</span>
		</div>

		<div class="w-buy-wrapper">
			<form id="w-buy-form" method="post" enctype='multipart/form-data'>
			<button type="submit" class="single_add_to_cart_button button alt" onclick="buy(event)">In den Warenkorb</button>
			<input type="hidden" name="add-to-cart" value="77" />
			<input type="hidden" name="product_id" value="77" />
			<input type="hidden" name="variation_id" class="variation_id" value="0" />
			<input type="hidden" name="attribute_aufteilung"  value="1" />
			</form>
		</div>


		<script>
			//sets VARIATIONS variable
			var FORM = document.querySelector("#w-buy-form");

			function updateSlider(value) {
				var slider = document.querySelector("#slider");
				if(value == undefined) {
					value = slider.value;
				}


				var box = document.querySelector("#box");
				var labelBanana = document.querySelector("span[data-dist-value-banana]");
				var labelPassion = document.querySelector("span[data-dist-value-passion]");
				var boxSize = box.getAttribute("data-size");

				var newLabelValue = Math.round( boxSize * (value / 100) * 0.5) / 0.5;
				var newFormValue =  parseInt(boxSize * 0.5 * (value / 100 - 0));

				labelBanana.innerHTML = (boxSize - newLabelValue) + "x";
				labelPassion.innerHTML = newLabelValue + "x";

				box.setAttribute("data-dist", newLabelValue);

				//update current dist on form
				FORM.setAttribute("data-selected-dist", newFormValue);

			}

			function updateButton(elem) {
				var newSize = elem.parentNode.getAttribute("data-size");
				var boxId = elem.parentNode.getAttribute("data-id");
				var box = document.querySelector("#box");
				var buttonList = document.querySelectorAll(".w-box-size-selector");

				//update current id on form
				FORM.setAttribute("data-selected-id", boxId);

				if(!elem.parentNode.hasAttribute("data-active")) {
					buttonList.forEach(function(x) {
						x.removeAttribute("data-active");
					});

					elem.parentNode.setAttribute("data-active","")

					box.setAttribute("data-size", newSize);
					updateSlider();
				}
			}

			function initPageState() {

				initPersonalizeText();
				updateSlider();
				// set all elements to the right state here
			}

			function updateProductVariation() {

			}

			function initPersonalizeText() {
				var observer = new MutationObserver(function(mutationList) {
					mutationList.forEach(function(mutation) {
						var elem = mutation.target.querySelector("[data-personalize-items]");
						if(elem != undefined) {
							var content = elem.getAttribute("data-personalize-items");
							var labelList = content.split("|");
							var r = parseInt(Math.random() * labelList.length);
							elem.innerHTML = labelList[r];
						}
					});
			  });

			  var targetList = document.querySelectorAll("[data-personalize]");

				targetList.forEach(function(target) {
					observer.observe(target, { attributes: true });
				});
			}

			function buy(event) {
					var id = FORM.getAttribute("data-selected-id");
					var dist = FORM.getAttribute("data-selected-dist");

					if(id != undefined && dist != undefined) {
						var distLabel = VARIATIONS[id][dist];

						FORM.querySelector("input[name=add-to-cart]").value = id;
						FORM.querySelector("input[name=product_id]").value = id;
						FORM.querySelector("input[name=attribute_aufteilung]").value = distLabel;

						console.log(id + ' ' + distLabel);
					} else {
						event.preventDefault();
					}
			}

			initPageState();
		</script>

	</div>

<?php
