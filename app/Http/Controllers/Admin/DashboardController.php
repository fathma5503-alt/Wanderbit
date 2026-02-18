<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminDashboard()
{
    $months = collect(range(1, 12));

    $bookingsData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('month')
        ->pluck('count', 'month');

    $monthlyBookings = $months->map(fn($month) => $bookingsData[$month] ?? 0);

    $revenueData = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_price) as total')
        )
        ->where('payment_status', 'paid')
        ->groupBy('month')
        ->pluck('total', 'month');

    $monthlyRevenue = $months->map(fn($month) => $revenueData[$month] ?? 0);

    $statusCounts = Booking::select('status', DB::raw('COUNT(*) as count'))
        ->groupBy('status')
        ->pluck('count', 'status');

    return view('admin.dashboard', compact(
        'monthlyBookings',
        'monthlyRevenue',
        'statusCounts'
    ));
}


}
