

$(document).ready(function() {
	var userAvailable = $('.user-available');
	var passwordReqs = 0;

	$('#username').on('change', function(ev) {
		var username = $(this).val();
		
		userAvailable.attr('data-status', 'unchecked');
		
		if (username.length >=3 && username.length <=25) {
			var ajax = $.post('check-username.php', {
				'username' : username	
			});
			
			ajax.done(function(data) {
				if (data == 'available') {
					userAvailable
						.attr('data-status', 'available')
						.html('Available');
			}else{
				userAvailable
					.attr('data-status', 'unavailable')
					.html('Unavailable')
						;
					}
			});
		}else{
			userAvailable
				.attr('data-status', 'unavailable')
				.html('Unavailable');
		}
	});
	
	$('#password').on('keyup', function(ev) {
		var password = $(this).val();
		passwordReqs = 0;
		
		if (password.length > 5) {
			passwordReqs++;
			$('.pass-length').attr('data-state', 'achieved');
		}
		
		if (password.match(/[a-z]/)) {
			passwordReqs++;
				$('.pass-lower').attr('data-state', 'achieved');
		}
		if (password.match(/[A-Z]/)) {
			passwordReqs++;
				$('.pass-upper').attr('data-state', 'achieved');
		}
		
		if (password.match(/[0-9]/)) {
			passwordReqs++;
				$('.pass-num').attr('data-state', 'achieved');
		}
		if (password.match(/[^a-zA-Z0-9]/)) {
			passwordReqs++;
				$('.pass-symbol').attr('data-state', 'achieved');
		}
		
		
		
	});
	
		$('#city').on('change', function(ev) {
			var city = $(this).val();
			cityReqs = 0;
			cityAvailable.attr('data-status','unchecked');
		
				if((city.length > 0 && city.length < 50) && (city.match(/[a-zA-Z\s]/))){
		
				cityAvailable.attr('data-status', 'available').html('Available');
				cityReqs++;
			} else {
				cityAvailable.attr('data-status', 'unavailable').html('Unavailable');
		
			}
		
	});
		
		
	var countryCan, countryUsa;
		
		$('[name="country"]').on('change', function (e) {
			if ($(this).val() == 'usa') {
				if (!countryUsa) {
		$('.load-country').load('usa.html', function (data) {
			countryUsa = data;
		});
		} else {
		$('.load-country').html(countryUsa);
		}
		} else {
			if (!countryCan) {
			$('.load-country').load('canada.html', function (data) {
			countryCan = data;
		});
			} else {
		$('.load-country').html(countryCan);
		}
		}
	});
	
	
	
	$('form').on('submit', function (ev) {
		
	if (
		userAvailable.attr('data-status') == 'unchecked'
		|| userAvailable.attr('data-status') == 'unavailable'
		|| passwordReqs < 5
		){
			ev.preventDefault();
		}
	});
	
	
	
	
});

