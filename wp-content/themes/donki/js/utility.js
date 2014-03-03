// Sticky header
$(function() {
	var header = $(".site-header");
	var headcont = $(".site-headcont");

	$(".site-main").waypoint(function(direction) {		
		if (direction == 'down') {
		  	headcont.css({ 'height':30 });
			header.addClass("sticky")
	         	.stop()
	         	.css("top", -header.outerHeight())
	         	.animate({"top" : 0});
	    } else {
		  	headcont.css({ 'height' : 'auto' });
		    header.removeClass("sticky")
		      	.stop()
		      	.css("top", header.outerHeight() + 50)
		      	.animate({"top" : ""});
		}
	});
});

// Add class col-lg-10 to Disqus Comment System
$(document).ready(function() {
	$("#disqus_thread").addClass("col-lg-10");
});