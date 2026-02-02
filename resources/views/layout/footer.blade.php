
<div class="site-footer">
		<div class="inner first">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">About Tour</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
						<div class="widget">
							<ul class="list-unstyled social">
								<li><a href="https://www.twitter.com/"><span class="icon-twitter"></span></a></li>
								<li><a href="https://www.instagram.com/"><span class="icon-instagram"></span></a></li>
								<li><a href="https://www.facebook.com/"><span class="icon-facebook"></span></a></li>
								<li><a href="https://www.linkedin.com/"><span class="icon-linkedin"></span></a></li>
								<li><a href="https://www.dribbble.com/"><span class="icon-dribbble"></span></a></li>
								<li><a href="https://www.pinterest.com/"><span class="icon-pinterest"></span></a></li>
								<li><a href="https://www.apple.com/"><span class="icon-apple"></span></a></li>
								<li><a href="https://www.google.com/"><span class="icon-google"></span></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2 pl-lg-5">
						<div class="widget">
							<h3 class="heading">Pages</h3>
							<ul class="links list-unstyled">
								<li><a href="{{ url('package') }}">Packages</a></li>
								<li><a href="{{ url('my_bookings') }}">MyBookings</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2">
						<div class="widget">
							<h3 class="heading">Resources</h3>
							<ul class="links list-unstyled">
								<li><a href="{{ url('about') }}">About</a></li>
								<li><a href="{{ url('services') }}">Services</a></li>
								<li><a href="{{ url('contact') }}">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">Contact</h3>
							<ul class="list-unstyled quick-info links">
								<li class="email"><a href="https://mail.google.com/mail/">mail@example.com</a></li>
								<li class="phone"><a href="#">+1 222 212 3819</a></li>
								<li class="address"><a href="https://maps.google.com/">43 Raymouth Rd. Baltemoer, London 3910</a></li>
							</ul>
						</div>
						<form method="POST" action="{{ route('logout') }}" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-link log_out">
        Logout
    </button>
</form>
					</div>
				</div>
			</div>
			
		</div>



	
						<p class="inn">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. 
						</p>
	

	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>