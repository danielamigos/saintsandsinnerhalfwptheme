<?php get_header(); ?>

		<div class="page-title-header" style="background-color:<?PHP the_field('page_title_background_color'); ?>">
				<div class="page-title"><?php _e( 'Archives', 'saintsandsinners' ); ?></div>
		</div>
		<main role="main" class="page-main-content">
		<!-- section -->
		<section> 

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
