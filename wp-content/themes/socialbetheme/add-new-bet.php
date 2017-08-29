<?php /* Template Name: Добавление ставки */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

		if ( is_user_logged_in() ) {
			get_template_part( 'template-parts/content', 'page' );
		}
		else {
			echo 'Авторизуйтесь, чтобы добавлять ставки';
		}
			// Include the page content template.


			// End of the loop.
		endwhile;
		?>


	</main><!-- .site-main -->



	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
