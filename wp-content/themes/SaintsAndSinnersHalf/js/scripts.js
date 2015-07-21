(function ($, root, undefined) {
	
	$(function () {		
		'use strict';		
		// DOM ready, take it away
		
		var days = $('.countdown-days .value').attr('data-days');
		var hours = $('.countdown-hours .value').attr('data-hours');
		var minutes = $('.countdown-minutes .value').attr('data-minutes');
		var seconds = $('.countdown-seconds .value').attr('data-seconds');
		var slideShowInterval = null;
		
		StartCountdown();
		function StartCountdown()
		{
			console.log(seconds);
			slideShowInterval = setInterval(CountDownTick, 1000);
		}
		
		function CountDownTick()
		{			
			seconds = seconds - 1;
			if (seconds < 0)
			{
				seconds = 59;
				minutes = minutes - 1;
				if (minutes < 0)
				{
					minutes = 59
					hours = hours - 1;
					if(hours < 0)
					{
						hours = 23;
						days = days - 1;
					}
				}
			}
			
			$('.countdown-days .value').html(days);
			$('.countdown-hours .value').html(hours);
			$('.countdown-minutes .value').html(minutes);
			$('.countdown-seconds .value').html(seconds);
			
		}
		
	});
	
	
	
})(jQuery, this);
