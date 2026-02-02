@extends('admin.layout')
@include('admin.sidebar')
@section('content')
<div class="container mt-4">
    
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <h5 class="mb-0">Booking Details</h5>
            <span class="badge bg-info">
                {{ strtoupper($booking->status) }}
            </span>
        </div>

        <div class="card-body">

            {{-- Booking Info --}}
            <h6 class="mb-3">📌 Booking Information</h6>
            <table class="table table-bordered">
                <tr>
                    <th>Booking ID</th>
                    <td>{{ $booking->booking_id }}</td>
                </tr>
                <tr>
                    <th>Guest Name</th>
                    <td>{{ $booking->user->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Package</th>
                    <td>{{ $booking->package->title }}</td>
                </tr>
                <tr>
                    <th>Guests</th>
                    <td>{{ $booking->guests }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td><strong>₹{{ number_format($booking->total_price, 2) }}</strong></td>
                </tr>
                <tr>
                    <th>Payment Status</th>
                    <td>
                        <span class="badge 
                            {{ $booking->payment_status === 'paid' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($booking->payment_status) }}
                        </span>
                    </td>
                </tr>
            </table>

            {{-- Dates --}}
            <h6 class="mt-4 mb-3">📅 Travel Dates</h6>
            <table class="table table-bordered">
                <tr>
                    <th>Check-in</th>
                    <td>{{ $booking->check_in_date->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Check-out</th>
                    <td>{{ $booking->check_out_date->format('d M Y') }}</td>
                </tr>
            </table>

            {{-- Special Requests --}}
            @if($booking->special_requests)
                <h6 class="mt-4 mb-2">📝 Special Requests</h6>
                <div class="alert alert-light">
                    {{ $booking->special_requests }}
                </div>
            @endif

            {{-- Action Buttons --}}
            <div class="mt-4 d-flex gap-2">
                
                {{-- User Actions --}}
                @if(auth()->id() === $booking->user_id && $booking->status === 'pending')
                    <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-primary boo">
                        Edit Booking
                    </a>

                    <form action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger" 
                                onclick="return confirm('Are you sure you want to cancel this booking?')">
                            Cancel Booking
                        </button>
                    </form>
                @endif

                {{-- Admin Back Button --}}
                @if(auth()->user()->is_admin)
                    <a href="{{ route('booking.index') }}" class="btn btn-secondary">
                        Back to Bookings
                    </a>
                @endif

            </div>

        </div>
    </div>
</div>
@endsection
