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

                {{-- Custom Pagination --}}
                @if($bookings->hasPages())
                    <div style="display:flex; justify-content:center; margin-top:20px;">
                        <ul style="display:flex; flex-direction:row; list-style:none; gap:8px; padding:0; margin:0; align-items:center;">

                            {{-- Previous Button --}}
                            @if($bookings->onFirstPage())
                                <li>
                                    <span style="padding:8px 16px; border-radius:6px; border:1px solid #555; color:#888; background:linear-gradient(135deg,#1E1E1E,#2A2A2A,#0B6E4F); cursor:not-allowed; display:inline-block;">
                                        &laquo; Prev
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $bookings->previousPageUrl() }}" style="padding:8px 16px; border-radius:6px; border:1px solid #d4af37; color:#d4af37; background:linear-gradient(135deg,#1E1E1E,#2A2A2A,#0B6E4F); text-decoration:none; display:inline-block;">
                                        &laquo; Prev
                                    </a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @foreach($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                                <li>
                                    @if($page == $bookings->currentPage())
                                        <span style="padding:8px 16px; border-radius:6px; border:1px solid #d4af37; color:#000; background:#d4af37; font-weight:600; display:inline-block;">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" style="padding:8px 16px; border-radius:6px; border:1px solid #d4af37; color:#d4af37; background:linear-gradient(135deg,#1E1E1E,#2A2A2A,#0B6E4F); text-decoration:none; display:inline-block;">
                                            {{ $page }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach

                            {{-- Next Button --}}
                            @if($bookings->hasMorePages())
                                <li>
                                    <a href="{{ $bookings->nextPageUrl() }}" style="padding:8px 16px; border-radius:6px; border:1px solid #d4af37; color:#d4af37; background:linear-gradient(135deg,#1E1E1E,#2A2A2A,#0B6E4F); text-decoration:none; display:inline-block;">
                                        Next &raquo;
                                    </a>
                                </li>
                            @else
                                <li>
                                    <span style="padding:8px 16px; border-radius:6px; border:1px solid #555; color:#888; background:linear-gradient(135deg,#1E1E1E,#2A2A2A,#0B6E4F); cursor:not-allowed; display:inline-block;">
                                        Next &raquo;
                                    </span>
                                </li>
                            @endif

                        </ul>
                    </div>
                @endif

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