$(document).on('ready', function(){
// 	$('.home .item').addClass('animate');

resizeVideo();	
	
var cssSelector = anime({
  targets: '.item',
  translateY: 0,
  opacity: 1
});

});

var video = document.getElementById('vimeo');

if(video) {
//Create a new Vimeo.Player object
var player = new Vimeo.Player(video);

//When the player is ready, set the volume to 0
player.ready().then(function() {
    player.setVolume(0);
});
}

function resizeVideo() {
	console.log('resize');
	var $allVideos = $("iframe[src^='https://player.vimeo.com'], iframe[src^='//player.vimeo.com'], iframe[src^='http://www.youtube.com']"),
	
	// The element that is fluid width
	$fluidEl = $("#content");
	
	$allVideos.each(function() {
		console.log('remove');
		$(this).data('aspectRatio', this.height / this.width).removeAttr('height').removeAttr('width');
	
	});	

$(window).resize(function() {

var newWidth = $fluidEl.width();

$allVideos.each(function() {

var $el = $(this);
$el
.width(newWidth)
.height(newWidth * $el.data('aspectRatio'));

});

// Kick off one resize to fix all videos on page load
}).resize();
}

$(function(){
  'use strict';
  var $page = $('#main'),
      options = {
        debug: true,
        prefetch: true,
        cacheLength: 2,
        onStart: {
          duration: 250, // Duration of our animation
          render: function ($container) {
            $container.addClass('is-exiting');
            smoothState.restartCSSAnimations();
          }
        },
        onReady: {
          duration: 0,
          render: function ($container, $newContent) {
            $container.removeClass('is-exiting');
            $container.html($newContent);
            resizeVideo();
            if($('body').hasClass('home')) {
	            $('body').removeClass('home');
            }
          }
        }
      },
      smoothState = $page.smoothState(options).data('smoothState');
});

$('.nav-trigger').on('click', function(){
	console.log('click');
	$(this).toggleClass('open');
});

$('.nav-trigger').on('click', function(){
	$('.overlay-navigation').toggleClass('open');
	$('.overlay__text').delay(1000).toggleClass('reveal');
});

var totalSlides = $('.img').length;

$('.img').on('click', function(e){
	e.preventDefault();
	slideID = $(this).data('slide-id');
	overlay(slideID);
	$('.overlay').addClass('open');
});

function overlay(slideID, slideType) {	
	var slide = $('[data-slide-id="'+slideID+'"]');
	var img = $(slide).data('large');
	var title = $(slide).data('title');
	var desc = $(slide).data('desc');
	
	if(desc == undefined) {
		desc = '';
	}
	
	if(totalSlides == 1) {
		$('button.prev, button.next').hide();
	} else {
		$('button.prev, button.next').show();
	}

	$('.overlay .content').html('<img class="" src="'+img+'" /><p>'+desc+'</p>');
}

$('.prev, .next').click(function() {
	if($(this).hasClass('next')){
	  if (slideID != totalSlides){
	    slideID++;
	  } else {
	    slideID = 1;
	  }
	} else{
	  if (slideID != 1){
	    slideID--;
	  } else {
	    slideID = totalSlides;
	  }
	}
	overlay(slideID);
	return false;
});

$('.close').on('click', function(){
	$('.overlay').removeClass('open');
});

if($('body').find('.changeText')) {

setTimeout(function(){
var text = ['<span class="changeColor color--purple">codes</span>', '<span class="changeColor color--green">sketches</span>', '<span class="changeColor color--purple">analyzes</span>', '<span class="changeColor color--purple">innovates</span>', '<span class="changeColor color--purple">leads</span>', '<span class="changeColor color--purple">iterates</span>', '<span class="changeColor textFinal">Gibbons</span>'];

var interval;

var counter = 0;
    var elem = $(".changeText").get(0);
    interval = setInterval(change, 200);
    function change() {
     elem.innerHTML = text[counter];
        counter++;
        if(counter >= text.length) { 
	        clearInterval(interval); 
// 	        $('.changeText').addClass('color--animate');
	    }
    }	
}, 100);

}