
@include('layout.head')
@include('layout.header')

<section>
    	<div class="hero">
		<div class="container">
			{{-- <div class="row align-items-center"> --}}
				{{-- <div class="col-lg-7"> --}}
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span></h1>
<div class="pros">
    @foreach($packages as $p)


  <a href="{{ route('package_details', $p->id) }}">
        <div style="margin: 10px 0; ">
            <a class="med" href="{{ asset('public/storage/' . $p->featured_image) }}" data-fancybox="gallery"> 
        </div>
         <h3>{{ $p->title }}</h3>

<img class="im" src="{{ asset('public/storage/' . $p->featured_image) }}"
                 width="300" height="300"
                 style=" border-radius: 5px;"></a> 
    </a>
{{-- 					
						<div class="media-text">
							<h3>Golden Gate Bridge</h3>
							<span class="location">United States (San Francisco, California)</span>
						</div>
						<img src="assets/images/hero-slider-1.jpg" alt="Image" class="img-fluid">
					 --}}
    @endforeach
</div>
</section>
@include('layout.footer')
@include('layout.script')