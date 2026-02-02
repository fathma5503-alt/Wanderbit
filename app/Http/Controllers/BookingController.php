<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Show booking form
     */
    public function create($package_id)
    {
        $package = Package::findOrFail($package_id);
        return view('booking.create', compact('package'));
    }

    /**
     * Store booking in database
     */
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'guests' => 'required|integer|min:1',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'special_requests' => 'nullable|max:500',
        ]);

        $package = Package::findOrFail($request->package_id);
        
        // Calculate duration and total price
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $nights = $checkOut->diffInDays($checkIn);
        $totalPrice = $package->price * $request->guests * $nights;

        // Create booking
        $booking = Booking::create([
            'booking_id' => Booking::generateBookingId(),
            'user_id' => Auth::id(),
            'package_id' => $request->package_id,
            'guests' => $request->guests,
            'total_price' => $totalPrice,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'special_requests' => $request->special_requests,
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->route('booking.show', $booking->id)
            ->with('success', 'Booking created successfully! Please proceed to payment.');
    }

    /**
     * Show single booking with details
     */
    public function show($id)
    {
        $booking = Booking::with(['user', 'package'])->findOrFail($id);

        if (!Auth::check() || (Auth::id() !== $booking->user_id && !Auth::user()->is_admin)) {
            abort(403);
        }

        return view('admin.booking.show', compact('booking'));
    }
    /**
     * Show edit form
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Only allow editing pending bookings
        if ($booking->status != 'pending') {
            return back()->with('error', 'Only pending bookings can be edited.');
        }

        // Authorize user
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        return view('booking.edit', compact('booking'));
    }

    /**
     * Update booking
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        // Only allow editing pending bookings
        if ($booking->status != 'pending') {
            return back()->with('error', 'Only pending bookings can be edited.');
        }

        // Authorize user
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'guests' => 'required|integer|min:1',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'special_requests' => 'nullable|max:500',
        ]);

        // Recalculate total price
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);
        $nights = $checkOut->diffInDays($checkIn);
        $totalPrice = $booking->package->price * $request->guests * $nights;

        $booking->update([
            'guests' => $request->guests,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $totalPrice,
            'special_requests' => $request->special_requests,
        ]);

        return redirect()->route('booking.show', $booking->id)
            ->with('success', 'Booking updated successfully!');
    }

    /**
     * Cancel booking
     */
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);

        // Authorize user
        if ($booking->user_id != Auth::id() && !Auth::user()->is_admin) {
            abort(403);
        }

        // Only allow cancelling pending or confirmed bookings
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return back()->with('error', 'This booking cannot be cancelled.');
        }

        $booking->update([
            'status' => 'cancelled',
            'payment_status' => $booking->payment_status === 'paid' ? 'refunded' : 'unpaid',
        ]);

        return back()->with('success', 'Booking cancelled successfully!');
    }

    /**
     * Show user's all bookings
     */
    public function myBookings()
    {
        $bookings = Auth::user()->bookings()->with('package')->latest()->paginate(10);
        return view('booking.my_bookings', compact('bookings'));
    }

    /**
     * Admin: Show all bookings
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'package'])->latest()->paginate(15);
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Admin: Update booking status
     */
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'payment_status' => 'required|in:unpaid,paid,refunded',
        ]);

        $booking->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'Booking status updated!');
    }

    /**
     * Admin: Delete booking
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return back()->with('success', 'Booking deleted successfully!');
    }
}