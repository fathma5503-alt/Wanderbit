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

    <div class="pack">

        {{-- Featured Image --}}
        <div style="margin: 10px 0;">
            <a href="{{ asset('public/storage/' . $package->featured_image) }}" 
               data-fancybox="gallery" 
               data-caption="{{ $package->title }}">
                <img class="ima" 
                     src="{{ asset('public/storage/' . $package->featured_image) }}" 
                     width="500px"  
                     style="object-fit: cover; border-radius: 5px; cursor:pointer;">
            </a>
        </div>

        {{-- Package Details --}}
        <div>
            <h1 class="d1">{{ $package->title }}</h1>
            <br>
            <h4 class="d2">
                <div>{{ $package->description }}</div>
                <br>
                <div>₹{{ number_format($package->price, 2) }} Per Night</div>
                <br>
                <div>₹{{ number_format($package->price * $package->duration_days, 2) }} Total</div>
                <br>
                <div>{{ $package->duration_days }} Days</div>
                <br>
                <div>{{ $package->category->name }} Package</div>
            </h4>

            <a href="{{ route('booking.create', $package->id) }}" class="book">
                Book Now
            </a>
        </div>

    </div>

    {{-- Other Images Gallery --}}
    <div class="other-images-grid">
        @if($package->other_images)
            @foreach(json_decode($package->other_images) as $image)
                <a href="{{ asset('public/storage/' . $image) }}" 
                   data-fancybox="gallery" 
                   data-caption="{{ $package->title }}">
                    <img 
                        src="{{ asset('public/storage/' . $image) }}"
                        alt="Other Image"
                        width="300" 
                        height="250"
                        style="margin:8px; border-radius:6px; object-fit:cover; cursor:pointer;">
                </a>
            @endforeach
        @else
            <p>No additional images</p>
        @endif
    </div>

</section>

@include('layout.footer')
@include('layout.script')