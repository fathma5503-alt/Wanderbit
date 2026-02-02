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

            @if($message = session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($message = session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
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
                                        <span class="badge bg-secondary">{{ $booking->booking_id }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('package_details', $booking->package->id) }}" 
                                           class="text-decoration-none">
                                            {{ Str::limit($booking->package->title, 30) }}
                                        </a>
                                    </td>
                                    <td>{{ $booking->check_in_date->format('d M Y') }}</td>
                                    <td>{{ $booking->check_out_date->format('d M Y') }}</td>
                                    <td><strong>₹{{ number_format($booking->total_price, 2) }}</strong></td>
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
                                           class="btn btn-sm btn-info text-white" title="View Details">View Details
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($booking->status == 'pending')
                                            <a href="{{ route('booking.edit', $booking->id) }}" 
                                               class="btn btn-sm btn-warning" title="Edit">Edit
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $bookings->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-inbox"></i>
                    <p class="mb-3">You haven't made any bookings yet.</p>
                    <a href="{{ route('package') }}" class="btn btn-primary">
                        <i class="fas fa-search"></i> Browse Packages
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layout.footer')
@include('layout.script')