
@include('layout.head')
@include('layout.header')

	<div class="hero">
		<div class="container" >
			<div class="row align-items-center"  >
				<div class="col-lg-7" >
					<div class="intro-wrap" >
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span></h1>

<div class="search">
  <form method="GET" action="{{ route('package') }}">
                        <div class="row mb-3">

                            <!-- Destination -->
                            <div class="col-lg-4 mb-2">
                                <select name="destination" class="form-control">
                                    <option value="">Destination</option>
                                    @foreach($packages as $p)
                                        <option value="{{ $p->id }}"
                                            {{ request('destination') == $p->id ? 'selected' : '' }}>
                                            {{ $p->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date -->
                            <div class="col-lg-5 mb-2">
                                <input type="text"
                                       name="daterange"
                                       class="form-control"
                                       value="{{ request('daterange') }}"
                                       placeholder="Select dates">
                            </div>

                            <!-- Guests -->
                            <div class="col-lg-3 mb-2">
                                <input type="number"
                                       name="guests"
                                       class="form-control"
                                       min="1"
                                       value="{{ request('guests') }}"
                                       placeholder="# of People">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Search
                        </button>
                    </form>
                    <!-- /SEARCH FORM -->
                </div>
            </div>
        </div>
				<div class="col-lg-5">
					<div class="slides">
						<img src="assets/images/australia.jpg" alt="Image" class="img-fluid active" style="width: 475px;height:650px;">
						<img src="assets/images/greece.jpg" alt="Image" class="img-fluid" style="width: 475px;height:650px;">
						<img src="assets/images/greece4.jpg" alt="Image" class="img-fluid" style="width: 475px;height:650px;">
						<img src="assets/images/japan.jpg" alt="Image" class="img-fluid" style="width: 475px;height:650px;">
						<img src="assets/images/korea2.jpg" alt="Image" class="img-fluid" style="width: 475px;height:650px;">
					</div>
				</div>
			</div>
		</div>
	</div>
				<form class="cat" method="GET" action="{{ route('home') }}">
    <select name="category" class="form-control" onchange="this.form.submit()">
        <option value="">All Categories</option>

        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ request('category') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</form>

<div class="package-slider owl-carousel owl-theme">

    @forelse($packages as $p)
        <div class="item">
            <div class="card package-card">

                <img src="{{ asset('public/storage/' . $p->featured_image) }}"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">

                <div class="card-body text-center">
                    <h5>{{ $p->title }}</h5>

                    <p class="text-muted mb-1">
                        {{ $p->category->name ?? 'Uncategorized' }}
                    </p>

                    <p class="mb-1">
                        <strong>₹{{ number_format($p->price) }}</strong>
                    </p>

                    <p class="text-sm">
                        {{ $p->duration_days }} Days
                    </p>

                    <a href="{{ route('package_details', $p->id) }}"
                       class="btn btn-primary btn-sm">
                        View Package
                    </a>
                </div>

            </div>
        </div>
    @empty
        <p class="text-center">No packages available</p>
    @endforelse

</div>


	<div class="untree_co-section">
		<div class="container">
			<div class="row mb-5 justify-content-center">
				<div class="col-lg-6 text-center">
					<h2 class="section-title text-center mb-3">Our Services</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
			</div>
			<div class="row align-items-stretch">
				<div class="col-lg-4 order-lg-1">
					<div class="h-100"><div class="frame h-100"><div class="feature-img-bg h-100" style="background-image: url('assets/images/hero-slider-1.jpg');"></div></div></div>
				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-house display-4 text-primary"></span>
							<h3>Beautiful Condo</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

					<div class="feature-1 ">
						<div class="align-self-center">
							<span class="flaticon-restaurant display-4 text-primary"></span>
							<h3>Restaurants & Cafe</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-mail display-4 text-primary"></span>
							<h3>Easy to Connect</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-phone-call display-4 text-primary"></span>
							<h3>24/7 Support</h3>
							<p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<div class="untree_co-section count-numbers py-5">
		<div class="container">
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="9313">0</span>
						</div>
						<span class="caption">No. of Travels</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="8492">0</span>
						</div>
						<span class="caption">No. of Clients</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="100">0</span>
						</div>
						<span class="caption">No. of Employees</span>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3">
					<div class="counter-wrap">
						<div class="counter">
							<span class="" data-number="120">0</span>
						</div>
						<span class="caption">No. of Countries</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="untree_co-section">
		<div class="container">
			<div class="row text-center justify-content-center mb-5">
				<div class="col-lg-7"><h2 class="section-title text-center">Popular Destination</h2></div>
			</div>

			<div class="owl-carousel owl-3-slider">

				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-1.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3>Golden Gate Bridge</h3>
							<span class="location">United States (San Francisco, California)</span>
						</div>
						<img src="assets/images/hero-slider-1.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>

				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-2.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3> Paris</h3>
							<span class="location">France </span>
						</div>
						<img src="assets/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>

				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-3.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3>Auckland skyline</h3>
							<span class="location">New Zealand</span>
						</div>
						<img src="assets/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>


				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-4.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3>Molokini Crater</h3>
							<span class="location">United States (Hawaii)</span>
						</div>
						<img src="assets/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>

				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-5.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3>Big Ben & Palace of Westminster</h3>
							<span class="location">United Kingdom (London)</span>
						</div>
						<img src="assets/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>
				    @foreach($packages as $p)
				<div class="item">
					<a class="media-thumb" href="{{ asset('public/storage/' . $p->featured_image) }}" data-fancybox="gallery">
						<div class="media-text">
							 <h3>{{ $p->title }}</h3>
						</div>
						<img src="{{ asset('public/storage/' . $p->featured_image) }}" alt="Image" class="img-fluid im">
					</a> 
				</div>
   @endforeach
				<div class="item">
					<a class="media-thumb" href="assets/images/hero-slider-1.jpg" data-fancybox="gallery">
						<div class="media-text">
							<h3>Eiffel Tower</h3>
							<span class="location">France</span>
						</div>
						<img src="assets/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
					</a> 
				</div>
			</div>
		</div>
	</div>


	<div class="untree_co-section testimonial-section mt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 text-center">
					<h2 class="section-title text-center mb-5">Testimonials</h2>

					<div class="owl-single owl-carousel no-nav">
						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="assets/images/person_2.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Adam Aderson</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="assets/images/person_3.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Lukas Devlin</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="assets/images/person_4.jpg" alt="Image" class="img-fluid">
							</figure>
							<h3 class="name">Kayla Bryant</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>


	{{-- <div class="untree_co-section">
		<div class="container">
			<div class="row justify-content-center text-center mb-5">
				<div class="col-lg-6">
					<h2 class="section-title text-center mb-3">Special Offers &amp; Discounts</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<div class="media-1">
						<a href="#" class="d-block mb-3"><img src="images/hero-slider-1.jpg" alt="Image" class="img-fluid"></a>
						<span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>Italy</span>
						</span>
						<div class="d-flex align-items-center">
							<div>
								<h3><a href="#">Rialto Mountains</a></h3>
								<div class="price ml-auto">
									<span>$520.00</span>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<div class="media-1">
						<a href="#" class="d-block mb-3"><img src="images/hero-slider-2.jpg" alt="Image" class="img-fluid"></a>
						<span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>United States</span>
						</span>
						<div class="d-flex align-items-center">
							<div>
								<h3><a href="#">San Francisco</a></h3>
								<div class="price ml-auto">
									<span>$520.00</span>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<div class="media-1">
						<a href="#" class="d-block mb-3"><img src="images/hero-slider-3.jpg" alt="Image" class="img-fluid"></a>
						<span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>Malaysia</span>
						</span>
						<div class="d-flex align-items-center">
							<div>
								<h3><a href="#">Perhentian Islands</a></h3>
								<div class="price ml-auto">
									<span>$750.00</span>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<div class="media-1">
						<a href="#" class="d-block mb-3"><img src="images/hero-slider-4.jpg" alt="Image" class="img-fluid"></a>

						<span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span>Switzerland</span>
						</span>

						<div class="d-flex align-items-center">
							<div>
								<h3><a href="#">Lake Thun</a></h3>
								<div class="price ml-auto">
									<span>$520.00</span>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
 --}}
	<div class="untree_co-section">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				
				<div class="col-lg-6">
					<figure class="img-play-video">
						<a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mwtbEGNABWU" data-fancybox>
							<span></span>
						</a>
						<img src="assets/images/hero-slider-2.jpg" alt="Image" class="img-fluid rounded-20">
					</figure>
				</div>

				<div class="col-lg-5">
					<h2 class="section-title text-left mb-4">Take a look at Tour Video</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>

					<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>

					<ul class="list-unstyled two-col clearfix">
						<li>Outdoor recreation activities</li>
						<li>Airlines</li>
						<li>Car Rentals</li>
						<li>Cruise Lines</li>
						<li>Hotels</li>
						<li>Railways</li>
						<li>Travel Insurance</li>
						<li>Package Tours</li>
						<li>Insurance</li>
						<li>Guide Books</li>
					</ul>

					<p><a href="#" class="btn btn-primary">Get Started</a></p>

					
				</div>
			</div>
		</div>
	</div>

	
	<h1 class="dis">Destinations</h1>
	
<div class="pro d-flex flex-wrap gap-4">
    @forelse($packages as $p)
        <a href="{{ route('package_details', $p->id) }}" class="text-decoration-none text-dark">
            <div>
                <img class="ima"
                     src="{{ asset('public/storage/' . $p->featured_image) }}"
                     width="300"
                     height="300"
                     style="object-fit: cover; border-radius: 8px;">
                <h3 class="mt-2 text-center">{{ $p->title }}</h3>
            </div>
        </a>
    @empty
        <p class="text-center text-muted w-100">No packages found</p>
    @endforelse
</div>
	<div class="py-5 cta-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h2 class="mb-2 section-title text-white ">Explore the World in Unmatched Luxury. Contact Us Now</h2>
					<p class="mb-4 lead">Curated journeys, hand-picked destinations, and unforgettable experiences crafted just for you.</p>
					<p class="mb-0"><a href="booking.html" class="btn btn-primary btn-sm">Get in touch</a></p>
				</div>
			</div>
		</div>
	</div>


	@include('layout.footer')
@include('layout.script')
