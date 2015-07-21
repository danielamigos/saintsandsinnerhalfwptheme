<?php /* Template Name: Front Page Template */ get_header(); ?>
	<main role="main">
		<!-- section -->
		<div class="what-where-when-why">
			<div>
				<div class="question">What:</div>
				<div class="answer">1/2 Marathon, Relay, Fun Run</div>
			</div>
			<div>
				<div class="question">When:</div>
				<div class="answer">September 26th,2015</div>
			</div>
			<div>
				<div class="question">Where:</div>
				<div class="answer">Lake Mead National Park, Nv.</div>
			</div>
			<div>
				<div class="question">Why:</div>
				<div class="answer">It's for a great cause</div>
			</div>
		</div>
		<section>		
			<?PHP $slides = '';
				  $numberOfSlides = count( get_field( 'flexible_content_slides', 'option' ) );
				if( have_rows('flexible_content_slides', 'option') ): ?>
			<div class="catapult-slideshow">
				<div class="catapult-slideshow-wrapper" style="">
					<div class="slideshow-gradient"></div>
					<div style="position:absolute;z-index:1; bottom:0; padding-left:20px; padding-bottom:20px;">
						<div style="font-weight:bold;font-size:24px;">Images Description, <br />may be many lines</div>
						<div style="font-weight:bold;font-size:24px;">							
			<?PHP 		for($i=0; $i<$numberOfSlides; $i++) :?>			
							<a href="#" class='slide-indicator' data-index='<?PHP echo $i; ?>'><img src="<?php echo get_template_directory_uri(); ?>/img/slide-indicator.png"></a>		
			<?PHP 		endfor; ?>							
							<a href="#" class="pause-slide"><img src="<?php echo get_template_directory_uri(); ?>/img/pause-button.png"></a>
						</div>
					</div>
					<div style="position:absolute;z-index:1; top:50%; padding-left: 20px;">
						<a class="previous-slide" href='#'><img src='<?php echo get_template_directory_uri(); ?>/img/arrow-left.png' alt='Previous' ></a>
					</div>
					<div style="position:absolute;z-index:1; top:50%; right:0; padding-right:20px;">
						<a class="next-slide" href='#'><img src='<?php echo get_template_directory_uri(); ?>/img/arrow-right.png' alt='Next' ></a>
					</div>				
			<?PHP 		while ( have_rows('flexible_content_slides', 'option') ) : the_row(); 
							if( get_row_layout() == 'image' ):$image = get_sub_field('image'); $link = get_sub_field('link');?>				
					<div class="catapult-slide">
					<?PHP if($link!=''):?> 
						<a href='<?PHP echo $link; ?>'><img src="<?php echo $image['url']; ?>"  data-description="<?PHP the_sub_field('description'); ?>"></a>
					<?PHP else: ?>
						<img src="<?php echo $image['url']; ?>" data-description="<?PHP the_sub_field('description'); ?>">
					<?PHP endif; ?>
					</div>		
			 <?PHP			endif;
				 		endwhile; ?>				
				</div>
			</div>
			<?PHP endif;  ?>
		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
