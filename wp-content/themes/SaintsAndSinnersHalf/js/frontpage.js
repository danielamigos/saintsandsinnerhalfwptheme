jQuery(document).ready(function($) {
	$('.catapult-slide').first().clone().appendTo('.catapult-slideshow-wrapper');						
	var slides = $('.catapult-slide');
	var numberOfSlides = slides.length-1;
	$('.slideshow-counter').html('1/'+numberOfSlides);
	var slideWidth = $('.catapult-slideshow').width();
	$('.catapult-slide').width(slideWidth);
	var currentPos = 0;
	var inTransition = false;
	var slideShowInterval;
	var speed = 4000;
	
	slideShowInterval = setInterval(NextSlide, speed);
					
	
	slides.wrapAll('<div id="catapultSlidesHolder"></div>');
	slides.css({ 'float' : 'left' });
	$('#catapultSlidesHolder').css('width', slideWidth * (numberOfSlides+1));
	$('.catapult-slide img').css('display', 'block');
	//$('#catapultSlidesHolder').click(function(){ NextSlide(); });


	ResizeSlides();							
	
	$(window).resize(function(){	
		ResizeSlides();
	});
	
	$(window).bind('orientationchange', function (e) { 
		setTimeout(function () {
			ResizeSlides();
		}, 500);
	});
	
	function ResizeSlides()
	{		
		slideWidth = $('.catapult-slideshow').width();					
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
	
	function PauseSlide()
	{
		if (slideShowInterval != -1)
		{
			clearInterval(slideShowInterval);
			slideShowInterval = -1;
		}
		else	
		{
			slideShowInterval = setInterval(NextSlide, speed);
		}
	}
	
	function GoToSlide(index)
	{
		if (inTransition == false)
		{
			if (index != currentPos)
			{
				inTransition = true;
				//$('.catapult-slideshow-indicators li.active').removeClass('active');
				//$(".catapult-slideshow-text").fadeOut();
				$('#catapultSlidesHolder').animate({'marginLeft' : slideWidth*-(index)},function(){		
					currentPos=parseInt(index);						
					//$(".catapult-slideshow-indicators li[data-index='"+index+"']").addClass('active');
					//$(".catapult-slideshow-text[data-index='"+index+"']").fadeIn();
					inTransition = false;
				});
			}
		}
	}
	

	$('.previous-slide').click(function(event)
	{							
		event.preventDefault();
		PreviousSlide()
	});
	
	$('.pause-slide').click(function(event)
	{
		event.preventDefault();
		PauseSlide();
	});
	
	$('.next-slide').click(function(event)
	{
		event.preventDefault();
		NextSlide();
	});
	
	$('.slide-indicator').click(function(event){
		event.preventDefault();
		var index = $(this).attr('data-index');
		GoToSlide(index);
	});
	
	//alert('<?php the_title(); ?>');
	//console.log('<?php echo get_field("slideshowparentlink")->post_title; ?>');
	//$('.current-menu-ancestor > a > ul.sub-menu').show();
	//$('.menu-item-object-imagegrid a:contains(<?php echo get_field("slideshowparentlink")->post_title; ?>)').after('<ul class="sub-menu"><li><?php the_title(); ?></li></ul>');
	
});