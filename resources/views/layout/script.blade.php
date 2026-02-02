
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script>
$(document).ready(function () {
    $('.package-slider').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            992: { items: 3 }
        }
    });
});
</script>

	<script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
	<script src="{{ asset('assets/js/aos.js') }}"></script>
	<script src="{{ asset('assets/js/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>

	<script src="{{ asset('assets/js/typed.js') }}"></script>
	<script>
		$(function() {
			var slides = $('.slides'),
			images = slides.find('img');

			images.each(function(i) {
				$(this).attr('data-id', i + 1);
			})

			var typed = new Typed('.typed-words', {
				strings: ["San Francisco."," Paris."," New Zealand.", " Maui.", " London."],
				typeSpeed: 80,
				backSpeed: 80,
				backDelay: 4000,
				startDelay: 1000,
				loop: true,
				showCursor: true,
				preStringTyped: (arrayPos, self) => {
					arrayPos++;
					console.log(arrayPos);
					$('.slides img').removeClass('active');
					$('.slides img[data-id="'+arrayPos+'"]').addClass('active');
				}

			});
		})
	</script>

	<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const guestsInput = document.getElementById('guests');
    const checkInInput = document.getElementById('check_in_date');
    const checkOutInput = document.getElementById('check_out_date');
    const packagePrice = parseFloat(document.getElementById('packagePrice').textContent);

    function calculateTotal() {
        const guests = parseInt(guestsInput.value) || 1;
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        
        let nights = 0;
        if (checkInInput.value && checkOutInput.value) {
            nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
            nights = nights > 0 ? nights : 0;
        }

        const total = packagePrice * guests * nights;

        document.getElementById('guestCount').textContent = guests;
        document.getElementById('nightCount').textContent = nights;
        document.getElementById('totalPrice').textContent = total.toFixed(2);
    }

    guestsInput.addEventListener('change', calculateTotal);
    checkInInput.addEventListener('change', calculateTotal);
    checkOutInput.addEventListener('change', calculateTotal);
});
</script>
<script>
$(function () {
    $('#dateRange').daterangepicker({
        minDate: moment(),
        autoApply: true,
        locale: { format: 'YYYY-MM-DD' }
    }, function(start, end) {
        $('#checkIn').val(start.format('YYYY-MM-DD'));
        $('#checkOut').val(end.format('YYYY-MM-DD'));
    });
});
</script>

</body>

</html>