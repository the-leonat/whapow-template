<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Whahow
 *
 * @package storefront
 */

 
$p1 = get_variable_product_by_sku("whapow_banana");
$p2 = get_variable_product_by_sku("whapow_passion");


function my_page_header() {
  ?>               
    <header class="entry-header">
    <?php storefront_post_thumbnail( 'full' ); ?>

    </header>
  <?php
}

// remove_action( 'storefront_page', 'storefront_page_header', 10 );
// add_action( 'storefront_page', 'my_page_header', 10 );
wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/whahow.js', array ( 'jquery' ), 1.1, true);


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main w-content-narrow" role="main">
			<?php while ( have_posts() ) : the_post();

				do_action( 'storefront_page_before' ); ?>

                <?php 
				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
      
	</div><!-- #primary -->

<?php
get_footer();
