@extends('admin.layout')
@include('admin.sidebar')
@section('content')
<div class="container py-4">

    <h2 class="mb-4">Welcome to WanderBit Admin Dashboard</h2>

      <a href="{{ route('blogs.index') }}" class="btn btn-primary mt-3">Manage Blogs</a>
    
    <div class="row">

        <!-- LINE CHART -->
        <div class="col-md-6 mb-4">
            <div class="card shadow p-3">
                <h5 class="mb-3">Monthly Bookings</h5>
                <canvas id="lineChart"></canvas>
            </div>
        </div>

        <!-- BAR CHART -->
        <div class="col-md-6 mb-4">
            <div class="card shadow p-3">
                <h5 class="mb-3">Monthly Revenue</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- PIE CHART -->
        <div class="col-md-6 mb-4">
            <div class="card shadow p-3">
                <h5 class="mb-3">Booking Status Distribution</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>

    </div>

</div>
@endsection


@section('scripts')

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const months = [
    'Jan','Feb','Mar','Apr','May','Jun',
    'Jul','Aug','Sep','Oct','Nov','Dec'
];

// LINE CHART - Monthly Bookings
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Bookings',
            data: {!! json_encode($monthlyBookings) !!},
            borderColor: '#4e73df',
            backgroundColor: 'rgba(78,115,223,0.1)',
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true }
        }
    }
});


// BAR CHART - Monthly Revenue
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'Revenue (₹)',
            data: {!! json_encode($monthlyRevenue) !!},
            backgroundColor: '#1cc88a',
            borderRadius: 5
        }]
    },
    options: {
        responsive: true
    }
});


// PIE CHART - Booking Status
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: {!! json_encode($statusCounts->keys()) !!},
        datasets: [{
            data: {!! json_encode($statusCounts->values()) !!},
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#e74a3b',
                '#f6c23e',
                '#36b9cc'
            ]
        }]
    },
    options: {
        responsive: true
    }
});

</script>
@endsection