@include('layout.head')
@include('layout.header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Edit Booking: {{ $booking->booking_id }}</h3>
                </div>

                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Current Booking Info -->
                    <div class="alert alert-info mb-4">
                        <h6 class="mb-2">Current Booking Details</h6>
                        <p class="mb-1"><strong>Package:</strong> {{ $booking->package->title }}</p>
                        <p class="mb-0"><strong>Status:</strong> 
                            <span class="badge bg-info">{{ ucfirst($booking->status) }}</span>
                        </p>
                    </div>

                    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="guests" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control @error('guests') is-invalid @enderror" 
                                   id="guests" name="guests" min="1" 
                                   value="{{ old('guests', $booking->guests) }}" required>
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
                                           value="{{ old('check_in_date', $booking->check_in_date->format('Y-m-d')) }}" required>
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
                                           value="{{ old('check_out_date', $booking->check_out_date->format('Y-m-d')) }}" required>
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
                                      placeholder="Any special requests? Let us know...">{{ old('special_requests', $booking->special_requests) }}</textarea>
                            @error('special_requests')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Updated Price Calculation -->
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h6>Updated Price Breakdown</h6>
                                <div class="row">
                                    <div class="col-6">Package Price:</div>
                                    <div class="col-6 text-end">₹<span id="packagePrice">{{ $booking->package->price }}</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Guests:</div>
                                    <div class="col-6 text-end"><span id="guestCount">{{ $booking->guests }}</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">Nights:</div>
                                    <div class="col-6 text-end"><span id="nightCount">0</span></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6"><strong>New Total Price:</strong></div>
                                    <div class="col-6 text-end"><strong>₹<span id="totalPrice">{{ $booking->total_price }}</span></strong></div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            <i class="fas fa-save"></i> Save Changes
                        </button>

                        <a href="{{ route('booking.show', $booking->id) }}" class="btn btn-secondary w-100 mt-2">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const guestsInput = document.getElementById('guests');
    const checkInInput = document.getElementById('check_in_date');
    const checkOutInput = document.getElementById('check_out_date');
    const packagePrice = parseFloat(document.getElementById('packagePrice').textContent);

    function calculateTotal() {
        const guests = parseInt(guestsInput.value) || 1;
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        
        let nights = 0;
        if (checkInInput.value && checkOutInput.value) {
            nights = Math.ceil((checkOut - checkIn) / (1000 * 60 * 60 * 24));
            nights = nights > 0 ? nights : 0;
        }

        const total = packagePrice * guests * nights;

        document.getElementById('guestCount').textContent = guests;
        document.getElementById('nightCount').textContent = nights;
        document.getElementById('totalPrice').textContent = total.toFixed(2);
    }

    guestsInput.addEventListener('change', calculateTotal);
    checkInInput.addEventListener('change', calculateTotal);
    checkOutInput.addEventListener('change', calculateTotal);

    // Initial calculation
    calculateTotal();
});
</script>
@include('layout.footer')
@include('layout.script')