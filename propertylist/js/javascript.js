/*wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})*/
// Animations init
new WOW().init();

$(document).ready(function(){
	var offset = 250;
	var duration = 500;

	$(window).scroll(function(){
		if ($(this).scrollTop() > offset) {
			$('.to-top').fadeIn(duration);
		} else {
			$('.to-top').fadeOut(duration);
		}
	});
});