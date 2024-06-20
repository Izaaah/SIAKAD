$(window).scroll(function () {
	var wScroll = $(this).scrollTop();
	// Navbar
	if (wScroll > $('.about').offset().top - 660) {
		$('nav').css({
			backgroundColor: 'white',
			boxShadow: '0px 1px 15px rgba(1,1,1,.5)'

		});
		$('nav a').css('color', '#1B1C1E');
		$('nav h2').css('color', 'rgb(61, 19, 130)');
	} else {
		$('nav').css({
			background: 'transparent',
			boxShadow: 'none'
		});
		$('nav a').css('color', 'white');
		$('nav a:hover').css('color', '#1B1C1E');
		$('nav h2').css('color', 'white');
	}
});

$('.page-scroll').click(function (event) {

	var tujuan = $(this).attr('href');
	var elemenTujuan = $(tujuan).offset().top;

	$('body, html').animate({
		scrollTop: elemenTujuan
	}, 1250, 'swing');

	event.preventDefault();
})