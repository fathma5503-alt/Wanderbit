
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
const durationDays = {{ isset($package) ? $package->duration_days : 0 }};

    function setCheckoutDate() {
        if (checkInInput.value) {

            let checkInDate = new Date(checkInInput.value);

            // Add duration days
            checkInDate.setDate(checkInDate.getDate() + durationDays);

            let year = checkInDate.getFullYear();
            let month = String(checkInDate.getMonth() + 1).padStart(2, '0');
            let day = String(checkInDate.getDate()).padStart(2, '0');

            checkOutInput.value = `${year}-${month}-${day}`;
        }
    }

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

    checkInInput.addEventListener('change', function() {
        setCheckoutDate();
        calculateTotal();
    });

    guestsInput.addEventListener('input', calculateTotal);

});
</script>

@isset($packages)
<script>
    const packageImages = [
        @foreach($packages as $p)
            @if($p->featured_image)
                "{{ asset('public/storage/'.$p->featured_image) }}",
            @endif
        @endforeach
    ];

    if (packageImages.length > 1) {
        let current = 0;
        const slider = document.getElementById('serviceSlider');

        if (slider) {
            slider.style.transition = 'opacity 0.4s ease-in-out';

            setInterval(function () {
                current = (current + 1) % packageImages.length;
                slider.style.opacity = '0';

                setTimeout(function () {
                    slider.style.backgroundImage = `url('${packageImages[current]}')`;
                    slider.style.opacity = '1';
                }, 400);

            }, 3000);
        }
    }
</script>
@endisset

<script>
    // Custom fancybox size
    $('[data-fancybox="gallery"]').fancybox({
        width: 900,
        height: 600,
        fitToView: false,
        aspectRatio: true,
        helpers: {
            overlay: {
                locked: false
            }
        }
    });
</script>
</body>

</html>