@include('layout.head')
@include('layout.header')
<section>

    	<div class="hero">
		<div class="container">
			{{-- <div class="row align-items-center"> --}}
				{{-- <div class="col-lg-7"> --}}
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Trip In <span class="typed-words"></span></h1>
</div>
</div>
</div>
<div class="pack">

    <div style="margin: 10px 0;">
        <img class="ima" 
             src="{{ asset('public/storage/' . $package ->featured_image) }}" 
             width="500px"  
             style="object-fit: cover; border-radius: 5px;">
    </div>
    {{-- <div class="other-images-grid">
           
                  <img src="{{ asset('public/storage/' .$package -> $other_images) }}" alt="Other Image">

              </div> --}}

    <div ><h1 class="d1">{{ $package->title }}</h1>
    <br>

   <h4 class="d2"> <div>{{ $package ->description }}</div>
    <br>
    <div>₹{{ $package ->price }} PerNight</div>
<br>
    <div>{{ $package  ->duration_days }} Days</div>
<br>
    <div>{{ $package ->category->name }} Package </div></h4>
    <a href="{{ route('booking.create', $package->id) }}" class="book">
    Book Now
</a>
{{-- <form class="view-cart-btn" action="{{ route('', $package ->id) }}" method="POST"> --}}
    @csrf
    {{-- <button class="bo" type="submit">Add wishlist</button> --}}
</form>

</div>
</div>
</div>

<div class="other-images-grid">
    @if($package->other_images)
        @foreach(json_decode($package->other_images) as $image)
            <img 
                src="{{ asset('public/storage/' . $image) }}"
                alt="Other Image"
                width="300" height="250"
                style="margin:8px;border-radius:6px;object-fit:cover;">
        @endforeach
    @else
        <p>No additional images</p>
    @endif
</div>

</section>

@include('layout.footer')
@include('layout.script')