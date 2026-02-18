@include('layout.head')
@include('layout.header')
@section('content')

<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">What Our Clients Say</h2>

        <div class="testimonial-grid">
            @foreach($testimonials as $t)
                <div class="testimonial-card">
                    
                    <div class="testimonial-image">
                        @if($t->image)
                            <img src="{{ asset('public/storage/' . $t->image) }}" alt="{{ $t->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($t->name) }}&background=0D8ABC&color=fff" alt="{{ $t->name }}">
                        @endif
                    </div>

                    <div class="testimonial-content">
                        <p class="message">
                            “{{ $t->message }}”
                        </p>

                        <h4 class="name">
                            {{ $t->name }}
                        </h4>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
	@include('layout.footer')
@include('layout.script')
