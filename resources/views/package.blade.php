
@include('layout.head')
@include('layout.header')

<section>
    	<div class="hero">
		<div class="container">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span></h1>
</div>
</div>
</div>
<div class="py-5 cta-section">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
	<h2 class="mb-2 section-title text-white text-center">Explore Our Exclusive Travel Packages</h2>
<div class="pros">
    @foreach($packages as $p)


  <a href="{{ route('package_details', $p->id) }}">
        <div style="margin: 10px 0; ">
            {{-- <a class="med" href="{{ asset('public/storage/' . $p->featured_image) }}" data-fancybox="gallery">  --}}
        </div>
         <h3>{{ $p->title }}</h3>

<img class="ima" src="{{ asset('public/storage/' . $p->featured_image) }}"
                 width="300" height="300"
                 style=" border-radius: 5px;"></a> 
    </a>
    @endforeach
</div>
</div>
</div>
</div>
</div>

</section>
@include('layout.footer')
@include('layout.script')