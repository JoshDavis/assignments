$(document).ready(function () {

$('.planets a').click(function (e) {
		
		var tab = $(this).attr('href');

		
		$('.planets > li').removeClass('current');
		
		$(this).parent().addClass('current');

		$(tab).show().css('z-index', 0);

		$('.nav-current').fadeOut(function () {
			
			$(this).removeClass('nav-current');
			$(tab).addClass('nav-current').css('z-index', 100);
		
		});
	
	});
});
