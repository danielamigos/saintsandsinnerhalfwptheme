<?php /* Template Name: Image Gallery */ get_header(); ?>

		<div class="page-title-header" style="background-color:<?PHP the_field('page_title_background_color'); ?>">
				<div class="page-title"><?php the_title(); ?></div>
				<?PHP if (function_exists(the_subtitle)): ?>
				<div class="page-subtitle"><?php the_subtitle(); ?></div>
				<?PHP endif;?>
		</div>
		<main role="main" class="gallery-main-content">
			<!-- section -->
			<section>
				<div class="row">
			<?php 			
			$images = get_field('gallery');			
			if( $images ): ?>
					<?php foreach( $images as $image ): ?>
						<div class="col-xs-3 image-column">
							<a href="<?php echo $image['url']; ?>" data-rel="lightbox-gallery-1">
								<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						</div>
					<?php endforeach; ?>
			<?php endif; ?>
				</div>
			</section>
			<!-- /section -->
			
		</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
