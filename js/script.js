var $j = jQuery.noConflict();

//------------------------------------------------- GLOBAL

var global = {

	init: function() {
		global.fixBrowsers();
		global.navClasses();
		global.embeds();
	},
	
	fixBrowsers: function() {
		var ua = navigator.userAgent.toLowerCase(),
		    chrome = ua.lastIndexOf('chrome/') > 0,
		    $html = $j('html');
		
		// Modernizr 2 bug: Chrome on Windows 8 gives a false negative for transforms3d support
		// Google does not plan to fix this; https://code.google.com/p/chromium/issues/detail?id=129004
		if (chrome) {
		    var chromeversion = ua.substr(ua.lastIndexOf('chrome/') + 7, 2);
		    if (chromeversion >= 12 && $html.hasClass('no-csstransforms3d')) {
		        $html
		            .removeClass('no-csstransforms3d')
		            .addClass('csstransforms3d');
		    }
		}
	},
	
	navClasses: function() {
		var $navGlobal = $j('#nav-global');
		
		$navGlobal
			.find('.children')	// child ULs
			.parent('li')		// LIs that have child ULs
			.each(function() {
				$j(this).addClass('hasChildren');
			});
	},
	
	embeds: function() {
		$j(window).load(function() {
		
			var resizeVideo = function() {
					$j('article embed').each(function() {
						var $this = $j(this),
							// get the dimensions defined by the embed's attributes
							attrWidth = parseInt($this.attr('width'), 10),
							attrHeight = parseInt($this.attr('height'), 10),
							// recalculate dimensions to match layout size
							ratio = attrHeight / attrWidth,						
							width = $this.closest('article').width(),
							height = width * ratio;
							
						$this
							.attr('width', width)
							.attr('height', height);
					});
				};
				
			/*	This only resizes the video once, when it is initially loaded. 
				For more advanced responsive functionality, you will need to 
				poll for resize intervals and reload the entire video while 
				updating dimensions. This is not particularly recommended.
			*/
			resizeVideo();
		});
	}
	
};

//------------------------------------------------- RESPONSIVE

var res = {

	$body: $j(document.body),
	
	init: function() {
		res.setupNav();
	},
	
	setupNav: function() {
		var $toggle = $j('#nav-toggle');
		
		$toggle.on('click', function(e) {
			e.preventDefault();
			
			if (!res.$body.hasClass('nav-open')) {
				res.$body
					.removeClass('nav-closed')
					.addClass('nav-open');
			} else {
				res.$body
					.removeClass('nav-open')
					.addClass('nav-closed');
			}
		});
	}
		
};

//------------------------------------------------- DOCUMENT READY

$j(function() {	

	global.init();
	res.init();

}); 