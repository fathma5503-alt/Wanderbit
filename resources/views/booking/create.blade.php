@include('layout.head')
@include('layout.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Book Your Package: {{ $package->title }}</h3>
                </div>

                <div class="card-body p-4">
                    <!-- Package Summary -->
                    <div class="alert alert-info">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/storage/' . $package->featured_image) }}" 
                                     alt="{{ $package->title }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <h5>{{ $package->title }}</h5>
                                <p class="text-muted mb-2">{{ Str::limit($package->description, 100) }}</p>
                                <p class="mb-1"><strong>Duration:</strong> {{ $package->duration_days }} days</p>
                                <p class="mb-1"><strong>Price per person/night:</strong> 
                                    <span class="text-success">₹{{ number_format($package->price, 2) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="package_id" value="{{ $package->id }}">

                        <div class="mb-3">
                            <label for="guests" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control @error('guests') is-invalid @enderror" 
                                   id="guests" name="guests" min="1" value="{{ old('guests', 1) }}" required>
                            @error('guests')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                    <input type="date" class="form-control @error('check_in_date') is-invalid @enderror" 
                                           id="check_in_date" name="check_in_date" 
                                           min="{{ now()->format('Y-m-d') }}"
                                           value="{{ old('check_in_date') }}" required>
                                    @error('check_in_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="check_out_date" class="form-label">Check-out Date</label>
                                    <input type="date" class="form-control @error('check_out_date') is-invalid @enderror" 
                                           id="check_out_date" name="check_out_date" 
                                           value="{{ old('check_out_date') }}" required>
                                    @error('check_out_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                            <textarea class="form-control @error('special_requests') is-invalid @enderror" 
                                      id="special_requests" name="special_requests" rows="4"
                                      placeholder="Any special requests? Let us know...">{{ old('special_requests') }}</textarea>
                            @error('special_requests')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price Calculation -->
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h6>Price Breakdown</h6>
                                <div class="row">
                                    <div class="col-6">Package Price:</div>
                                    <div class="col-6 text-end">₹<span id="packagePrice">{{ $package->price }}</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Guests:</div>
                                    <div class="col-6 text-end"><span id="guestCount">1</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Nights:</div>
                                    <div class="col-6 text-end"><span id="nightCount">0</span></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6"><strong>Total Price:</strong></div>
                                    <div class="col-6 text-end"><strong>₹<span id="totalPrice">0</span></strong></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-check-circle"></i> Proceed to Payment
                        </button>

                        <a href="{{ route('package') }}" class="btn btn-secondary w-100 mt-2">
                            <i class="fas fa-arrow-left"></i> Back to Packages
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layout.footer')
@include('layout.script')