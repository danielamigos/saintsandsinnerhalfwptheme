<?php get_header(); ?>

		<div class="page-title-header" style="background-color:<?PHP the_field('page_title_background_color'); ?>">
				<div class="page-title"><?php the_title(); ?></div>
				<?PHP if (function_exists(the_subtitle)): ?>
				<div class="page-subtitle"><?php the_subtitle(); ?></div>
				<?PHP endif;?>
		</div>
		<main role="main" class="page-main-content">
			<!-- section -->
			<section>
	
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
					<?php the_content(); ?>
	
					<?php comments_template( '', true ); // Remove if you don't want comments ?>
	
					<br class="clear">
	
				</article>
				<!-- /article -->
	
			<?php endwhile; ?>
	
			<?php else: ?>
	
				<!-- article -->
				<article>
	
					<h2><?php _e( 'Sorry, nothing to display.', 'saintsandsinners' ); ?></h2>
	
				</article>
				<!-- /article -->
	
			<?php endif; ?>
	
			</section>
			<!-- /section -->
		</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
