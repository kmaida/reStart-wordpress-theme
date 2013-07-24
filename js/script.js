var $j = jQuery.noConflict();

//------------------------------------------------- GLOBAL

var global = {

	init: function() {
		
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