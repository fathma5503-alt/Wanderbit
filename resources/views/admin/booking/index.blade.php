@extends('admin.layout')
@include('admin.sidebar')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Manage Bookings</h2>
                <div>
                    <span class="badge bg-warning">{{ $bookings->total() }} Total Bookings</span>
                </div>
            </div>
        </div>
    </div>

    @if($message = session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-lg">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Booking ID</th>
                        <th>Guest Name</th>
                        <th>Package</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Guests</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $booking)
                        <tr>
                            <td>
                                <span class="badge bg-primary">{{ $booking->booking_id }}</span>
                            </td>
                            <td>{{ $booking->user->name }}</td>
                            <td>
                                <a href="#" class="text-decoration-none" 
                                   data-bs-toggle="tooltip" title="{{ $booking->package->title }}">
                                    {{ Str::limit($booking->package->title, 25) }}
                                </a>
                            </td>
                            <td>{{ $booking->check_in_date->format('d M Y') }}</td>
                            <td>{{ $booking->check_out_date->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $booking->guests }}</span>
                            </td>
                            <td>
                                <strong>₹{{ number_format($booking->total_price, 2) }}</strong>
                            </td>
                            <td>
                                <span class="badge bg-{{ 
                                    $booking->status == 'confirmed' ? 'success' : 
                                    ($booking->status == 'completed' ? 'info' :
                                    ($booking->status == 'cancelled' ? 'danger' : 'warning'))
                                }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ 
                                    $booking->payment_status == 'paid' ? 'success' : 
                                    ($booking->payment_status == 'refunded' ? 'info' : 'danger')
                                }}">
                                    {{ ucfirst($booking->payment_status) }}
                                </span>
                            </td>
                            <td>
                                <!-- View -->
                                <a href="{{ route('admin.booking.show', $booking->id) }}"  class="btn btn-sm view">View</a>

                                {{-- <!-- Update Status Modal Trigger -->
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                        data-bs-target="#updateModal{{ $booking->id }}" title="Update Status">Update Status
                                    <i class="fas fa-edit"></i>
                                </button> --}}

                                <!-- Delete -->
                                <form action="{{ route('booking.destroy', $booking->id) }}" method="POST" 
                                      class="d-inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">Delete
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div class="modal fade" id="viewModal{{ $booking->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Booking Details - {{ $booking->booking_id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <strong>Guest Name:</strong><br>{{ $booking->user->name }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Email:</strong><br>{{ $booking->user->email }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <strong>Package:</strong><br>{{ $booking->package->title }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Duration:</strong><br>{{ $booking->package->duration_days }} days
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <strong>Check-in:</strong><br>{{ $booking->check_in_date->format('d M Y') }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Check-out:</strong><br>{{ $booking->check_out_date->format('d M Y') }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <strong>Guests:</strong><br>{{ $booking->guests }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Total Amount:</strong><br>₹{{ number_format($booking->total_price, 2) }}
                                            </div>
                                        </div>
                                        @if($booking->special_requests)
                                            <div class="mb-3">
                                                <strong>Special Requests:</strong><br>{{ $booking->special_requests }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Status Modal -->
                        <div class="modal fade" id="updateModal{{ $booking->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Booking Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <form action="{{ route('booking.updateStatus', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Booking Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Payment Status</label>
                                                <select name="payment_status" class="form-select" required>
                                                    <option value="unpaid" {{ $booking->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                    <option value="paid" {{ $booking->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                                    <option value="refunded" {{ $booking->payment_status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update Status</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <i class="fas fa-inbox"></i><br>No bookings found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->count() > 0)
            <div class="card-footer bg-light">
                {{ $bookings->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
