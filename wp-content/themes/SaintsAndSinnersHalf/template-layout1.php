<?php /* Template Name: Layout 1 */ get_header(); ?>

		<div class="page-title" style="background-color:<?PHP the_field('page_title_background_color'); ?>">
				<h1><?php the_title(); ?></h1>
				<?PHP if (function_exists(the_subtitle)): ?>
				<div class="page-subtitle"><?php the_subtitle(); ?></div>
				<?PHP endif;?>
		</div>
		<main role="main" class="layout-01-main-content">
			<!-- section -->
			<section>
			<div class="row" style="margin:0;">				
  				<div class="row-lg-height row-md-height row-sm-height">
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top left-column" style="padding:0;">						
      					<div class="inside">
							<img src="<?PHP echo get_field('layout_01_image_left_column')['url']; ?>" alt="">	
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top left-column" style="background-color:#58585a;">						
      					<div class="inside">
							  
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
							  
							  
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
				</div><!-- /row-height -->
			</div><!-- /row -->
			<div class="row">
				<div class="col-md-12">
					<img src="<?PHP echo get_field('layout_01_image_full_width_bottom')['url']; ?>" alt="">
				</div>				
			</div>
			
			</section>
			<!-- /section -->
			
		</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
