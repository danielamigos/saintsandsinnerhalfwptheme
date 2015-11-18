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
		
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');
		
		fbq('init', '1529192910737177');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1529192910737177&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->

	</head>
	<body <?php body_class(); ?>>
	<?php 
	  // Fix menu overlap bug..
	  //if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;">&nbsp;</div>'; 
	?>
    <nav class="navbar navbar-inverse navbar-fixed-top" style="<?php if ( is_admin_bar_showing() ) echo 'top:32px;';?>">
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
		<?PHP 
			$isFrontPage = false;
			if(basename(get_page_template()) == 'template-frontpage.php')
				$isFrontPage = true;
		?>
		<!-- wrapper -->
		<div class="container">
			<div class="row">				
  				<div class="row-lg-height row-md-height row-sm-height">
					<div class="col-sm-3 col-lg-height col-md-height col-sm-height col-top left-column">						
      					<div class="inside">	
							<header class="header clear" role="banner">												
								<?php if ( get_theme_mod( 'saintsandsinners_logo' )): ?>
									<div class='logo <?PHP if(!$isFrontPage) echo 'hidden-xs'; ?>' >
										<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
											<img src='<?php echo esc_url( get_theme_mod( 'saintsandsinners_logo' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
										</a>
									</div>
								<?php endif; if(!$isFrontPage): ?>	
									<div class='logo2 visible-xs-block' >
										<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr(get_bloginfo( 'name','display')); ?>' rel='home'>
											<img src='<?php echo esc_url( get_theme_mod( 'saintsandsinners_logo2' ) ); ?>' alt='<?php echo esc_attr(get_bloginfo('name','display')); ?>'>
										</a>
									</div>
								<?PHP endif; ?>
									
							</header>
							<div class="call-to-action">
								<?php $link_target = (get_field('link_target','option')=='New Tab')?'_blank':'_self'; ?>
								<a href="<?PHP the_field('register_link','option') ?>" class="btn btn-default" target="<?PHP echo $link_target; ?>">Register Today</a>
							</div>
							<div class="countdown <?PHP if(!$isFrontPage) echo 'hidden-xs'; ?>" data-date='<?PHP the_field('raceday_date','option'); ?>' >
								<?PHP
									date_default_timezone_set('America/Phoenix');
									$raceHour = get_field('start_hour','option');
									$raceMinutes = get_field('start_minute','option');
									
									$racedate = strtotime(get_field('raceday_date','option').'T'.$raceHour.':'.$raceMinutes.':00-07:00')-mktime();								
								    $dtF = new DateTime("@0");
								    $dtT = new DateTime("@$racedate");
									$dif = $dtF->diff($dtT);
									$days = $dif->days;
									$hours = $dif->h;
									$minutes = $dif->i;
									$seconds = $dif->s;
								 ?>
								<h2>Countdown to Raceday!</h2>
								<div class="countdown-days">
									<div class="value" data-days="<?PHP echo $days; ?>"><?PHP echo $days; ?></div>
									<div class="title">Days</div>
								</div>
								<div class="countdown-hours">							
									<div class="value" data-hours="<?PHP echo $hours; ?>"><?PHP echo $hours; ?></div>
									<div class="title">Hours</div>
								</div>
								<div class="countdown-minutes">
									<div class="value" data-minutes="<?PHP echo $minutes; ?>"><?PHP echo $minutes; ?></div>
									<div class="title">Minutes</div>
								</div>
								<div class="countdown-seconds">
									<div class="value" data-seconds="<?PHP echo $seconds; ?>"><?PHP echo $seconds; ?></div>
									<div class="title">Seconds</div>
								</div>
							</div>
							<?PHP 
								$facebookLink = get_field('facebook_link','option');
								$twitterLink = get_field('twitter_link','option');
								$instagramLink = get_field('instagram_link','option');
								$linkedinLink = get_field('linkedin_link','option');	
							?>
							<div class="social-links <?PHP if(!$isFrontPage) echo 'hidden-xs'; ?>">
								Follow us on:
								<span>
								<?PHP if($facebookLink): ?> 
									<a class="facebook" href="<?PHP echo $facebookLink; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-facebook.png" alt="Facebook" ></a>
								<?PHP endif; if ($twitterLink): ?>
									<a class="twitter" href="<?PHP echo $twitterLink; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-twitter.png" alt="Twitter" ></a>
								<?PHP endif; if ($instagramLink): ?>
									<a class="instagram" href="<?PHP echo $instagramLink; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-instagram.png" alt="Instagram" ></a>
								<?PHP endif; if ($linkedinLink): ?>
									<a class="linkedin" href="<?PHP echo $linkedinLink; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/social-linkedin.png" alt="LinkedIn" ></a>
								<?PHP endif; ?>
								</span>
							</div>
						</div> <!-- inside -->
					</div> <!-- col-sm-3 col-lg-height col-md-height  left-column -->
					<div class="col-sm-9 col-lg-height col-md-height col-sm-height col-top main-column">			
      					<div class="inside">
