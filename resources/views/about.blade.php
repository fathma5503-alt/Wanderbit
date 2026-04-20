
@include('layout.head')
@include('layout.header')


  <div class="hero hero-inner">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mx-auto text-center">
          <div class="intro-wrap">
            <h1 class="mb-0">About Us</h1>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  
  <div class="untree_co-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="owl-single dots-absolute owl-carousel">
            <img src="assets/images/slider-1.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-2.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-3.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-4.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
            <img src="assets/images/slider-5.jpg" alt="Free HTML Template by Untree.co" class="img-fluid rounded-20">
          </div>
        </div>
        <div class="col-lg-5 pl-lg-5 ml-auto">
          <h2 class="section-title mb-4">About WanderBit <span class="text">.</span></h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
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
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center">
          <h2 class="section-title mb-3 text-center">Team</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 mb-4">
          <div class="team">
            <img src="assets/images/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
              <h3 class="mb-0">James Watson</h3>
              <p>Co-Founder &amp; CEO</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="team">
            <img src="assets/images/person_2.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
              <h3 class="mb-0">Carl Anderson</h3>
              <p>Co-Founder &amp; CEO</p>
            </div>
          </div>
        </div>

        <div class="col-lg-3 mb-4">
          <div class="team">
            <img src="assets/images/person_4.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
              <h3 class="mb-0">Michelle Allison</h3>
              <p>Co-Founder &amp; CEO</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 mb-4">
          <div class="team">
            <img src="assets/images/person_3.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
            <div class="px-3">
              <h3 class="mb-0">Drew Wood</h3>
              <p>Co-Founder &amp; CEO</p>
            </div>
          </div>
        </div>
  @foreach($teams as $team)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="team">

                @if($team->image)
                    <img src="{{ asset('public/storage/'.$team->image) }}" alt="{{ $team->name }}" class="img-fluid mb-4 rounded-20">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($team->name) }}&background=1f263e&color=fff" alt="{{ $team->name }}" class="img-fluid mb-4 rounded-20">
                @endif

                <div class="px-3">
                    <h3 class="mb-0">{{ $team->name }}</h3>
                    <p>{{ $team->description }}</p>
                </div>

            </div>
        </div>
    @endforeach
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
								<img src="assets/images/person_2.jpg" alt="Image" class="img-fluids">
							</figure>
							<h3 class="name">Adam Aderson</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="assets/images/person_3.jpg" alt="Image" class="img-fluids">
							</figure>
							<h3 class="name">Lukas Devlin</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

						<div class="testimonial mx-auto">
							<figure class="img-wrap">
								<img src="assets/images/person_4.jpg" alt="Image" class="img-fluids">
							</figure>
							<h3 class="name">Kayla Bryant</h3>
							<blockquote>
								<p>&ldquo;There live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
							</blockquote>
						</div>

 @foreach($testimonials as $t)
   <div class="testimonial mx-auto">
    <figure class="img-wrap">
     @if($t->image) 
      <img src="{{ asset('public/storage/'.$t->image) }}"  alt="{{ $t->name }}"class="img-flui">
       @else
         <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=0D8ABC&color=fff" alt="{{ $t->name }}" class="img-flui">
      @endif
     </figure>

    <h3 class="name">{{ $t->name }}</h3>

     <blockquote>
       <p>“{{ $t->message }}”</p>
     </blockquote>
   </div>
  @endforeach

					</div>

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
                <h2 class="section-title text-left mb-4">Take a look at our Video</h2>

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

	@include('layout.footer')
@include('layout.script')
