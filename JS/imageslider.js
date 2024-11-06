'use strict';

$(function() {
	
	var width = 100;
	var animationspeed = 1000;
	var pause = 4000;
	var currentslide = 1;

	var $slider = $('#slider');
	var $slidercontainer = $slider.find('.slides');
	var $slides = $slidercontainer.find('.slide');

	var interval;

	function startslider() {
		interval = setInterval(function() {
		$slidercontainer.animate({'margin-left': '-='+width+'%'}, animationspeed, function(){
			currentslide++;
			if (currentslide === $slides.length) {
				currentslide = 1;
				$slidercontainer.css('margin-left', 0);
			}
		});
		}, pause);
	}

	function stopslider(){
		clearInterval(interval);
	}

	$slider.on('mouseenter', stopslider).on('mouseleave', startslider)
	startslider();
});
