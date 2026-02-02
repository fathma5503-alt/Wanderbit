@include('layout.head')
@include('layout.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if($message = session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Booking Details</h3>
                        <span class="badge bg-info">{{ $booking->booking_id }}</span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Booking Status -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="text-muted">Booking Status</h6>
                            <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }} p-2">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted">Payment Status</h6>
                            <span class="badge bg-{{ $booking->payment_status == 'paid' ? 'success' : ($booking->payment_status == 'refunded' ? 'info' : 'danger') }} p-2">
                                {{ ucfirst($booking->payment_status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Package Information -->
                    <div class="border-bottom pb-3 mb-3">
                        <h5 class="mb-3">Package Information</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('public/storage/' . $booking->package->featured_image) }}" 
                                     alt="{{ $booking->package->title }}" class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <h6>{{ $booking->package->title }}</h6>
                                <p class="text-muted small">{{ Str::limit($booking->package->description, 150) }}</p>
                                <p class="mb-1"><strong>Category:</strong> {{ $booking->package->category->name ?? 'N/A' }}</p>
                                <p class="mb-1"><strong>Duration:</strong> {{ $booking->package->duration_days }} days</p>
                                <p class="mb-0"><strong>Price per person/night:</strong> ₹{{ number_format($booking->package->price, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="border-bottom pb-3 mb-3">
                        <h5 class="mb-3">Your Booking</h5>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Check-in Date:</strong></div>
                            <div class="col-6">{{ $booking->check_in_date->format('d M Y') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Check-out Date:</strong></div>
                            <div class="col-6">{{ $booking->check_out_date->format('d M Y') }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Number of Guests:</strong></div>
                            <div class="col-6">{{ $booking->guests }}</div>
                        </div>
                        @if($booking->special_requests)
                            <div class="row mb-2">
                                <div class="col-6"><strong>Special Requests:</strong></div>
                                <div class="col-6">{{ $booking->special_requests }}</div>
                            </div>
                        @endif
                    </div>

                    <!-- Price Summary -->
                    <div class="bg-light p-3 rounded mb-3">
                        <h6 class="mb-3">Price Summary</h6>
                        @php
                            $nights = $booking->check_out_date->diffInDays($booking->check_in_date);
                        @endphp
                        <div class="row mb-2">
                            <div class="col-6">Package Price × {{ $booking->guests }} Guests × {{ $nights }} Nights:</div>
                            <div class="col-6 text-end">₹{{ number_format($booking->total_price, 2) }}</div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-6"><strong>Total Amount:</strong></div>
                            <div class="col-6 text-end"><strong class="text-success text-lg">₹{{ number_format($booking->total_price, 2) }}</strong></div>
                        </div>
                    </div>

                    <!-- User Information -->
                    <div class="border-top pt-3 mb-3">
                        <h5 class="mb-3">Guest Information</h5>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Name:</strong></div>
                            <div class="col-6">{{ $booking->user->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6"><strong>Email:</strong></div>
                            <div class="col-6">{{ $booking->user->email }}</div>
                        </div>
                        @if($booking->user->phone)
                            <div class="row">
                                <div class="col-6"><strong>Phone:</strong></div>
                                <div class="col-6">{{ $booking->user->phone }}</div>
                            </div>
                        @endif
                    </div>

                    <!-- Booking Dates -->
                    <div class="text-muted small text-center border-top pt-3">
                        <p class="mb-1">Booked on: {{ $booking->created_at->format('d M Y, h:i A') }}</p>
                        @if($booking->updated_at != $booking->created_at)
                            <p class="mb-0">Last updated: {{ $booking->updated_at->format('d M Y, h:i A') }}</p>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="card-footer bg-light">
                    <div class="d-flex gap-2">
                        @if($booking->status == 'pending')
                            <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit Booking
                            </a>
                            
                            <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-times-circle"></i> Cancel Booking
                                </button>
                            </form>

                            @if($booking->payment_status == 'unpaid')
                                <button class="btn btn-success ms-auto">
                                    <i class="fas fa-credit-card"></i> Pay Now
                                </button>
                            @endif
                        @endif

                        <a href="{{ route('booking.myBookings') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to My Bookings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@include('layout.script')