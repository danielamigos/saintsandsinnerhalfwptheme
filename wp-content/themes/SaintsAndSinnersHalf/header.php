<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
		/*
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });*/
        </script>

	</head>
	<body <?php body_class(); ?>>
	<?php 
	  // Fix menu overlap bug..
	  if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;">&nbsp;</div>'; 
	?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
			<?php bootstrap_nav(); ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

		<!-- wrapper -->
		<div class="container">
			<div class="row">				
  				<div class="row-lg-height row-md-height row-sm-height">
					<div class="col-sm-3 col-lg-height col-md-height col-sm-height col-top left-column">						
      					<div class="inside">
							<header class="header clear" role="banner">						
								<?php if ( get_theme_mod( 'saintsandsinners_logo' )): ?>
									<div class='logo'>
										<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
											<img src='<?php echo esc_url( get_theme_mod( 'saintsandsinners_logo' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
										</a>
									</div>
								<?php endif; ?>		
							</header>
							<div class="call-to-action">
								<a href="<?PHP the_field('register_link','option') ?>" class="btn btn-default btn-lg">Register Today</a>
							</div>
							<div class="countdown">
								<?PHP
									$racedate = get_field('raceday_date','option');
									$days = 35;
									$hours = 20;
									$minutes = 35;
									$seconds = 30;
								 ?>
								<h2>Countdown to Raceday!</h2>
								<div class="countdown-days">
									<div class="value" data-hours="<?PHP echo $days; ?>"><?PHP echo $days; ?></div>
									<div class="title">Days</div>
								</div>
								<div class="countdown-hours">							
									<div class="value" data-hours="<?PHP echo $hours; ?>"><?PHP echo $hours; ?></div>
									<div class="title">Hours</div>
								</div>
								<div class="countdown-minutes">
									<div class="value" data-hours="<?PHP echo $minutes; ?>"><?PHP echo $minutes; ?></div>
									<div class="title">Minuts</div>
								</div>
								<div class="countdown-seconds">
									<div class="value" data-hours="<?PHP echo $seconds; ?>"><?PHP echo $seconds; ?></div>
									<div class="title">Seconds</div>
								</div>
							</div>
							<div class="social-links">
								Follow us on:
								<span>
									<a class="facebook" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/social-facebook.png" alt="Facebook" ></a>
									<a class="twitter" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/social-twitter.png" alt="Twitter" ></a>
									<a class="instagram" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/social-instagram.png" alt="Instagram" ></a>
									<a class="linkedin" href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/social-linkedin.png" alt="LinkedIn" ></a>
								</span>
							</div>													
						</div> <!-- inside -->
					</div> <!-- col-sm-3 col-lg-height col-md-height  left-column -->
					<div class="col-sm-9 col-lg-height col-md-height col-sm-height col-top main-column">			
      					<div class="inside">
