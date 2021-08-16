$(document).ready(function(){

	$(".owl-carousel").owlCarousel({
		items: 1
	});
	$('.grid').masonry({
	  // options...
	  itemSelector: '.grid-item',
	  columnWidth: '.grid-sizer',
	  percentPosition: true,
	});
});