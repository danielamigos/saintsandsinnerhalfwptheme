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
			<div class="catapult-slideshow">
				<div class="catapult-slideshow-wrapper">
					<div class="catapult-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-01.png">
					</div>				
					<div class="catapult-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-03.png">
					</div>				
					<div class="catapult-slide">
						<img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-05.png">
					</div>					
				</div>
			</div>

			<!--
			<h1><?php //_e( 'Latest Posts', 'saintsandsinners' ); ?></h1>

			<?php //get_template_part('loop'); ?>

			<?php //get_template_part('pagination'); ?>-->	
		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
