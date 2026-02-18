@include('layout.head')
@include('layout.header')

<div class="container py-5">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Bookings</h2>
                <a href="{{ route('package') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> New Booking
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($bookings->count() > 0)

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Booking ID</th>
                                <th>Package</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $booking->booking_id }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('package_details', $booking->package->id) }}">
                                            {{ Str::limit($booking->package->title, 30) }}
                                        </a>
                                    </td>

                                    <td>{{ $booking->check_in_date->format('d M Y') }}</td>
                                    <td>{{ $booking->check_out_date->format('d M Y') }}</td>

                                    <td>
                                        <strong>
                                            ₹{{ number_format(abs($booking->total_price), 2) }}
                                        </strong>
                                    </td>

                                    <td>
                                        <span class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'cancelled' ? 'danger' : 'warning') }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="badge bg-{{ $booking->payment_status == 'paid' ? 'success' : ($booking->payment_status == 'refunded' ? 'info' : 'danger') }}">
                                            {{ ucfirst($booking->payment_status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <a href="{{ route('booking.show', $booking->id) }}"
                                           class="btn btn-sm btn-info text-white">
                                            View
                                        </a>

                                        @if($booking->status == 'pending')
                                            <a href="{{ route('booking.edit', $booking->id) }}"
                                               class="btn btn-sm btn-warning">
                                                Edit
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $bookings->links() }}
                </div>

            @else
                <div class="alert alert-info text-center">
                    <p>You haven't made any bookings yet.</p>
                    <a href="{{ route('package') }}" class="btn btn-primary">
                        Browse Packages
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>

@include('layout.footer')
@include('layout.script')
