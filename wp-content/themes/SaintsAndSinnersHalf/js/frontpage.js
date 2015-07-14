jQuery(document).ready(function($) {
	$('.catapult-slide').first().clone().appendTo('.catapult-slideshow-wrapper');						
	var slides = $('.catapult-slide');
	//var orginalImageSize = 730;
	var numberOfSlides = slides.length-1;
	$('.slideshow-counter').html('1/'+numberOfSlides);
	//var slideWidth = 600;
	var slideWidth = $('.catapult-slideshow').width();
	//var orginalImageSize = slideWidth; 
	var slideHeight = $('.left-bar-area').height();
	//if (slideWidth > orginalImageSize)
	//{
	//	slideWidth = orginalImageSize;
	//	$('.catapult-slideshow-wrapper').width(slideWidth);
	//}
	$('.catapult-slide').width(slideWidth);
	$('.catapult-slide img').height(slideHeight);
	var currentPos = 0;
	var inTransition = false;
	var slideShowInterval;
	var speed = 4000;
	
	slideShowInterval = setInterval(NextSlide, speed);
					
	
	slides.wrapAll('<div id="catapultSlidesHolder"></div>');
	slides.css({ 'float' : 'left' });
	$('#catapultSlidesHolder').css('width', slideWidth * (numberOfSlides+1));
	$('.catapult-slide img').css('display', 'block');
	$('#catapultSlidesHolder').click(function(){ NextSlide(); });
	$('.left-image-name').html($(slides[currentPos]).children('img').attr('data-name'));
	$('.description-slide').attr('data-content',$(slides[currentPos]).children('img').attr('data-description'));


	/*ResizeSlides();							
	
	$(window).resize(function(){	
		ResizeSlides();
	});
	
	$(window).bind('orientationchange', function (e) { 
		setTimeout(function () {
			ResizeSlides();
		}, 500);
	});*/
	
	function ResizeSlides()
	{
		
		slideWidth = $('.catapult-slideshow').width();
		slideHeight = $('.left-bar-area').height();
		
		
		if ($(window).width() < 992)
		{
			slideWidth = $('.img-logo').width();
			slideHeight = (slideWidth*5)/8;
		}
		else
		{
			slideWidth = $('.catapult-slideshow').width();
			slideHeight = $('.left-bar-area').height();									
		}
		
		$('.catapult-slide img').height(slideHeight);
		$('.catapult-slideshow-wrapper').width(slideWidth);
		$.each(slides,function(index,value){  $(value).width(slideWidth); });
		
		$('#catapultSlidesHolder').css('width', slideWidth * (numberOfSlides+1));
		$('#catapultSlidesHolder').css('marginLeft', slideWidth*-currentPos);
		
	}

	function NextSlide()
	{						
		if (inTransition == false)
		{
			inTransition = true;
			$('#catapultSlidesHolder').animate({'marginLeft' : slideWidth*-(currentPos+1)},function(){
				currentPos++;
				if (currentPos == numberOfSlides)
				{
					$('#catapultSlidesHolder').css({'marginLeft':0});
					currentPos = 0;
				}
				
				$('.slideshow-counter').html((currentPos+1)+'/'+numberOfSlides);
				$('.left-image-name').html($(slides[currentPos]).children('img').attr('data-name'));
				inTransition = false;
			});
		}
	}

	function PreviousSlide()
	{						
		if (inTransition == false)
		{
			inTransition = true;
			console.log(currentPos);
			currentPos--;
			if (currentPos == -1)
			{
				currentPos = numberOfSlides-1;
				$('#catapultSlidesHolder').css({'marginLeft':slideWidth*-(currentPos+1)});
			}
			$('#catapultSlidesHolder').animate({'marginLeft' : slideWidth*-(currentPos)},function(){
				$('.slideshow-counter').html((currentPos+1)+'/'+numberOfSlides);
				$('.left-image-name').html($(slides[currentPos]).children('img').attr('data-name'));
				inTransition = false;
			});
		}
	}
	
	function PauseSlide(event)
	{
		if (slideShowInterval != -1)
		{
			event.preventDefault();
			clearInterval(slideShowInterval);
			slideShowInterval = -1;
		}
		else	
		{
			event.preventDefault();
			slideShowInterval = setInterval(NextSlide, speed);
		}
	}
	

	$('.previous-slide').click(function(event)
	{							
		event.preventDefault();
		PreviousSlide()
	});
	
	$('.pause-slide').click(function(event)
	{
		PauseSlide(event);
	});
	
	$('.next-slide').click(function(event)
	{
		event.preventDefault();
		NextSlide();
	});
	
	//alert('<?php the_title(); ?>');
	//console.log('<?php echo get_field("slideshowparentlink")->post_title; ?>');
	//$('.current-menu-ancestor > a > ul.sub-menu').show();
	//$('.menu-item-object-imagegrid a:contains(<?php echo get_field("slideshowparentlink")->post_title; ?>)').after('<ul class="sub-menu"><li><?php the_title(); ?></li></ul>');
	
});