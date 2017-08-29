<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_post_thumbnail(); ?>

	<div class="entry-content">
		<?php _e('  Текст ставки:','bets_lang') ?>

		<?php
			the_content();

        $terms = get_the_terms( $post->ID, 'bet_status' );
        foreach($terms as $term) {
          echo '<p>' . __('Статус ставки: ', 'bets_lang') .''. $term->name . '</p>';
        }

        $terms = get_the_terms( $post->ID, 'bet_type' );
        foreach($terms as $term) {

          echo '<p>' . __('Тип ставки: ', 'bets_lang') .''. $term->name .'</p>';
        }
    ?>

    <div class="fancybutton">

			<a href="#" class="gogobet" data-id="<?php the_ID(); ?>"><?php _e('Ставка пройдет!','bets_lang') ?>
				<span class="bets-count"><?php display_post_likes( get_the_ID() ); ?></span>
			</a>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
