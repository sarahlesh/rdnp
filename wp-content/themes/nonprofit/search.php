<?php 
get_header();

get_template_part( 'parts/titlebar/titlebar', '1' ); ?>

	<main id="l-main" class="row ">
		<div class="large-9 main columns search-result">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) {
					the_post(); ?>
					<article <?php post_class( 'result' ); ?>>

						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div>
						  <span><?php the_author() ?></span>
						  <span>  <?php the_date('M, d, Y') ?>  </span>
						  <?php the_category() ?>
					  </div>
					</article>
				<?php }
			}else {

				if ( is_search() ) { ?>
					<div class="no-result large-push-3 large-6">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nonprofit' ); ?></p>
						<?php get_search_form(); ?>
					</div>

				<?php }else { ?>
					<div class="no-result large-push-3 large-6">
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nonprofit' ); ?></p>
						<?php get_search_form(); ?>
					</div>
					<?php
				}
	    }
			 ?>
		</div>
		<?php get_sidebar(); ?>
	</main>

<?php get_footer(); ?>