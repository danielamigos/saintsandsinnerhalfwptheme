<?php /* Template Name: Dynamic Content */ get_header(); ?>

		<div class="page-title-header" style="background-color:<?PHP the_field('page_title_background_color'); ?>">
				<div class="page-title"><?php the_title(); ?></div>
				<?PHP if (function_exists(the_subtitle)): ?>
				<div class="page-subtitle"><?php the_subtitle(); ?></div>
				<?PHP endif;?>
		</div>
		<main role="main" class="dynamic-content-main-content">
			<!-- section -->
			<section>
			
				 <?PHP if( have_rows('dynamic_content') ):
					     // loop through the rows of data
					    while ( have_rows('dynamic_content') ) : the_row();					
					        if( get_row_layout() == 'text' ):					
					        	$columns = get_sub_field('columns');					
					        	$text = get_sub_field('text');		
								$bgcolor1 = get_sub_field('background_color_for_column_1');			
					        	$text2 = get_sub_field('text_2');
								$bgcolor2 = get_sub_field('background_color_for_column_2');
								if ($columns == '1') : ?>
			<div class="row" style="">				
  				<div class="col-md-12 text-column" style="background-color:<?PHP echo $bgcolor1;?>;">
					<?PHP echo $text; ?>
				</div><!-- /row-height -->
			</div><!-- /row -->
								<?PHP else: ?>
								
			<div class="row" style="">				
  				<div class="row-lg-height row-md-height row-sm-height">
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top text-column" style="background-color:<?PHP echo $bgcolor1;?>;">						
      					<div class="inside">
							<?PHP echo $text; ?>
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top text-column" style="background-color:<?PHP echo $bgcolor2;?>;">						
      					<div class="inside">
						  <?PHP echo $text2; ?>
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
				</div><!-- /row-height -->
			</div><!-- /row -->
								<?PHP	
									endif;				
					        elseif( get_row_layout() == 'image' ): 				
					        	$columns = get_sub_field('columns');				
					        	$image = get_sub_field('image');				
					        	$link = get_sub_field('link');				
					        	$image_2 = get_sub_field('image_2');				
					        	$link_2 = get_sub_field('link_2');?>
								<?PHP if($columns == "1"): ?>
									<?PHP if($link==''):?>
				<div class="row">
					<div class="col-md-12 image-column">
						<img src="<?PHP echo $image['url']; ?>" alt="">
					</div>				
				</div>
									<?PHP else: ?>
				<div class="row">
					<div class="col-md-12 image-column">
						<a href="<?PHP echo $link; ?>"><img src="<?PHP echo $image['url']; ?>" alt=""></a>
					</div>				
				</div>
									<?PHP endif; ?>
								<?PHP else:?>				
				<div class="row">
									<?PHP if($link==''):?>
					<div class="col-md-6 image-column">
						<img src="<?PHP echo $image['url']; ?>" alt="">
					</div>				
									<?PHP else: ?>
					<div class="col-md6 image-column">
						<a href="<?PHP echo $link; ?>"><img src="<?PHP echo $image['url']; ?>" alt=""></a>
					</div>				
									<?PHP endif; ?>				
									<?PHP if($link_2==''):?>
					<div class="col-md-6 image-column">
						<img src="<?PHP echo $image_2['url']; ?>" alt="">
					</div>				
									<?PHP else: ?>
					<div class="col-md-6 image-column">
						<a href="<?PHP echo $link_2; ?>"><img src="<?PHP echo $image_2['url']; ?>" alt=""></a>
					</div>		
									<?PHP endif; ?>		
				</div>
								<?PHP endif;
							elseif(get_row_layout() == 'text_and_image'):
					        	$textPosition = get_sub_field('text_position');
					        	$text = get_sub_field('text'); 
								$bgColor = get_sub_field('background_color'); ?>								
			<div class="row" style="">				
  				<div class="row-lg-height row-md-height row-sm-height">
			  				<?PHP if($textPosition == 'Left') :?>
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top text-column" style="background-color:<?PHP echo $bgColor;?>;">						
      					<div class="inside">
							  <?PHP echo $text; ?>  								    
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
							<?PHP else: ?>
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top image-column" style="">						
      					<div class="inside">
							  <?PHP while ( have_rows('image_repeater') ) : the_row();
					        	$image = get_sub_field('image');
					        	$link = get_sub_field('image_link'); ?>
								<?PHP if($link==''):?>							  						    
							<img src="<?PHP echo $image['url']; ?>" alt=""> 
								<?PHP else: ?>
							<a href="<?PHP echo $link; ?>"><img src="<?PHP echo $image['url']; ?>" alt=""></a>
								<?PHP endif;
									endwhile; ?>
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
							<?PHP endif;  
								if($textPosition == 'Right') :?> 
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top text-column" style="background-color:<?PHP echo $bgColor;?>;">						
      					<div class="inside">
							  <?PHP echo $text; ?>  								    
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
							<?PHP else: ?>
					<div class="col-sm-6 col-lg-height col-md-height col-sm-height col-top image-column" style="">						
      					<div class="inside">
								<?PHP if($link==''):?>							  						    
							<img src="<?PHP echo $image['url']; ?>" alt=""> 
								<?PHP else: ?>
							<a href="<?PHP echo $link; ?>"><img src="<?PHP echo $image['url']; ?>" alt=""></a>
								<?PHP endif; ?>
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
							<?PHP endif; ?>
				</div><!-- /row-height -->
			</div><!-- /row -->
								<?PHP
					        endif;
					    endwhile; ?>
	
	
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
