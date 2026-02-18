@include('layout.head')
@include('layout.header')

@section('content')

<section class="team-section">
    <div class="container">
        <h2 class="section-title">Meet Our Team</h2>

        <div class="team-grid">
            @foreach($teams as $team)
                <div class="team-card">

                    <div class="team-image">
                        @if($team->image)
                            <img src="{{ asset('public/storage/' . $team->image) }}" alt="{{ $team->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($team->name) }}&background=1f263e&color=fff"
                                 alt="{{ $team->name }}">
                        @endif
                    </div>

                    <div class="team-content">
                        <h4 class="name">
                            {{ $team->name }}
                        </h4>

                        <p class="description">
                            {{ $team->description }}
                        </p>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@include('layout.footer')
@include('layout.script')
