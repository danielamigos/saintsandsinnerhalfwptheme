				
						</div> <!-- /inside -->
					</div> <!-- /main-column -->
				</div><!-- /row-height -->
			</div><!-- /row -->
		</div><!-- /container -->
		<footer class="footer">
			<div class="container" >			
				<div class="row">
					<div class="col-md-3">
						<div class="sponsers-text-wrapper">
							<span class="sponsers-top">Our wonderful</span><br/>
							<span class="sponsers-bottom">Sponsers</span>							 
						</div>
					</div>
					<div class="col-md-9">	
						<div class="row">
							<?PHP while ( have_rows('sponser_logos', 'option') ) : the_row(); $image = get_sub_field('image'); $link = get_sub_field('link'); $name = get_sub_field('name')?>
							<div class="col-md-3 sponser-logo">
								<?PHP if (get_sub_field('link')!=''): ?>
								<a href="<?PHP echo $link; ?>" title="<?PHP echo $name; ?>" target="_blank"><img src="<?PHP echo $image['url']; ?>" alt="<?PHP echo $name; ?>"></a>				
								<?PHP else:?>								
								<img src="<?PHP echo $image['url']; ?>" alt="<?PHP echo $name; ?>" title="<?PHP echo $name; ?>">							
								<?PHP endif;?>
							</div>
							<?PHP endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
