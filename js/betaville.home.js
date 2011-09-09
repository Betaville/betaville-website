jQuery(document).ready(function() {
	BV.Carousel.init();
	
$("#thevideo").click(function() {
	$.fancybox({
		'padding'             : 0,
		'autoScale'   : false,
		'transitionIn'        : 'elastic',
		'transitionOut'       : 'elastic',
		'title'               : this.title,
		'width'               : 680,
		'height'              : 495,
		'href'                : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
		'type'                : 'swf',    // <--add a comma here
		'swf'                 : {'allowfullscreen':'true'} // <-- flashvars here
		});
		return false;
	}); 
});

BV = {};

BV.Carousel = {
	$carousel: null,
	$carouselNav: null,
	$carouselNavActive: null,
	
	init: function() {
	
		this.$carousel = $('#tagline-carousel');
		this.$carouselNav = $('#tagline-carousel-nav a');
		this.$carouselNavActive = $('#tagline-carousel-nav .active');

			
		this.$carousel.jcarousel({
			auto: 5,
			scroll: 1,
			visible: 1,
			animation: 'slow',
			wrap: 'both',
			initCallback: BV.Carousel.initCallback,
			buttonNextHTML: null,
			buttonPrevHTML: null,
			itemVisibleInCallback: {
				onBeforeAnimation: BV.Carousel.visibleCallback
			}
			
		});
	},
	
	initCallback: function(carousel) {
		
		$("span", BV.Carousel.$carouselNav).hide();
		
		carousel.clip.hover(function() {
		   carousel.stopAuto();
		}, function() {
		   carousel.startAuto();
		});
	
		BV.Carousel.$carouselNav.click(function(e) {
			carousel.startAuto(0);
			carousel.scroll(jQuery.jcarousel.intval($(this).index() + 1));
			return false;
		});
	},
	
	visibleCallback: function(carousel, li, index) {
		_current = $(BV.Carousel.$carouselNav).eq(index - 1).position().left;
		
		BV.Carousel.$carouselNavActive.animate({left: _current}, "slow");
	}
}
