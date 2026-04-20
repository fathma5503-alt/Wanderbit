
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
                        <button type="submit" class="btn btn-primary w-1000">
                            Search
                        </button>
                    </form>
                           

                        </div>

                    <!-- /SEARCH FORM -->
                </div>
            </div>
        </div>
				<div class="col-lg-5">
					<div class="slides">
						<img src="assets/images/australia.jpg" alt="Image" class="img-fluid active imagban" >
						<img src="assets/images/greece.jpg" alt="Image" class="img-fluid imagban" >
						<img src="assets/images/greece4.jpg" alt="Image" class="img-fluid imagban" >
						<img src="assets/images/japan.jpg" alt="Image" class="img-fluid imagban" >
						<img src="assets/images/korea2.jpg" alt="Image" class="img-fluid imagban" >
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
                <p>Discover the world your way. WanderBit brings you curated travel packages, expert guidance, and memories that last a lifetime.</p>
            </div>
        </div>
        <div class="row align-items-stretch">

            {{-- SLIDING IMAGE --}}
            <div class="col-lg-4 order-lg-1">
                <div class="h-100">
                    <div class="frame h-100">
                        <div id="serviceSlider" class="feature-img-bg h-100" 
                             style="background-size: cover; 
                                    background-position: center; 
                                    background-image: url('{{ $packages->isNotEmpty() && $packages->first()->featured_image ? asset('public/storage/'.$packages->first()->featured_image) : 'assets/images/hero-slider-1.jpg' }}');
                                    border-radius: 20px;
                                    transition: background-image 0.8s ease-in-out;
                                    min-height: 400px;">
                        </div>
                    </div>
                </div>
            </div>

            {{-- LEFT FEATURES --}}
            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-house display-4 text-primary"></span>
                        <h3>Handpicked Destinations</h3>
                        <p class="mb-0">We carefully select the world's most breathtaking destinations — from tropical beaches to mountain retreats — so every trip feels like a dream.</p>
                    </div>
                </div>

                <div class="feature-1">
                    <div class="align-self-center">
                        <span class="flaticon-restaurant display-4 text-primary"></span>
                        <h3>Local Dining Experiences</h3>
                        <p class="mb-0">Taste the world through its food. We connect you with authentic local restaurants and hidden culinary gems at every destination.</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT FEATURES --}}
            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-mail display-4 text-primary"></span>
                        <h3>Easy Booking</h3>
                        <p class="mb-0">Book your perfect holiday in just a few clicks. Our seamless booking system keeps everything simple, fast, and hassle-free.</p>
                    </div>
                </div>

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-phone-call display-4 text-primary"></span>
                        <h3>24/7 Travel Support</h3>
                        <p class="mb-0">Wherever you are in the world, our dedicated support team is always just a call away — ready to help at any hour, any day.</p>
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
						<img src="{{ asset('public/storage/' . $p->featured_image) }}" alt="Image" class="img-fluid im" style="height: 500px">
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
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            
            <div class="col-lg-6">
                <figure class="img-play-video">
                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mwtbEGNABWU" data-fancybox>
                        <span></span>
                    </a>
                    @if(isset($featuredPackage) && $featuredPackage->featured_image)
                        <img src="{{ asset('public/storage/' . $featuredPackage->featured_image) }}" 
                             alt="{{ $featuredPackage->title }}" 
                             class="img-flu rounded-20"
                             style="width:100%; height:450px; object-fit:cover; border-radius:20px;">
                    @else
                        <img src="assets/images/hero-slider-2.jpg" 
                             alt="Tour Image" 
                             class="img-flu rounded-20">
                    @endif
                </figure>
            </div>

            <div class="col-lg-5">
                <h2 class="section-title text-left mb-4">Take a look at Tour Video</h2>

                @if(isset($featuredPackage))
                    <p>{{ Str::limit($featuredPackage->description, 150) }}</p>
                    <p class="mb-4">
                        Explore <strong style="color:#d4af37;">{{ $featuredPackage->title }}</strong> — 
                        {{ $featuredPackage->duration_days }} days of unforgettable experience. 
                        Starting at ₹{{ number_format($featuredPackage->price, 2) }} per night.
                    </p>
                @else
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                @endif

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

                <p>
                    @if(isset($featuredPackage))
                        <a href="{{ route('package_details', $featuredPackage->id) }}" class="btn btn-primary">
                            View Package
                        </a>
                    @else
                        <a href="#" class="btn btn-primary">Get Started</a>
                    @endif
                </p>
            </div>

        </div>
    </div>
</div>
<div class="py-5 cta-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
	<h2 class="mb-2 section-title text-white text-center">Destinations</h2>
	
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
</div>
			</div>
		</div>
	</div>
	<div class="py-5 cta-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h2 class="mb-2 section-title text-white ">Explore the World in Unmatched Luxury. Contact Us Now</h2>
					<p class="mb-4 lead">Curated journeys, hand-picked destinations, and unforgettable experiences crafted just for you.</p>
					<p class="mb-0"><a href="{{ url('contact') }}" class="btn btn-primary btn-sm">Get in touch</a></p>
				</div>
			</div>
		</div>
	</div>


	@include('layout.footer')
@include('layout.script')
