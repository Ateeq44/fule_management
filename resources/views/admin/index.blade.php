@extends('layouts.admin')

@section('content')

<div class="container">

    <h2>Dashboard Overview</h2>

    <div class="row mt-4">

        <!-- Weekly Liters -->
        <div class="col-md-4">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h6>Weekly Liters</h6>
                    <h3>{{ $weeklyLiters }}</h3>
                </div>
            </div>
        </div>

        <!-- Weekly Cost -->
        <div class="col-md-4">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h6>Weekly Cost</h6>
                    <h3>${{ $weeklyCost }}</h3>
                </div>
            </div>
        </div>

        <!-- Weekly Entries -->
        <div class="col-md-4">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h6>Weekly Entries</h6>
                    <h3>{{ $weeklyEntries }}</h3>
                </div>
            </div>
        </div>

        <!-- Monthly Liters -->
        <div class="col-md-4">
            <div class="card bg-warning text-white mb-3">
                <div class="card-body">
                    <h6>Monthly Liters</h6>
                    <h3>{{ $monthlyLiters }}</h3>
                </div>
            </div>
        </div>

        <!-- Monthly Cost -->
        <div class="col-md-4">
            <div class="card bg-danger text-white mb-3">
                <div class="card-body">
                    <h6>Monthly Cost</h6>
                    <h3>${{ $monthlyCost }}</h3>
                </div>
            </div>
        </div>

        <!-- Monthly Entries -->
        <div class="col-md-4">
            <div class="card bg-dark text-white mb-3">
                <div class="card-body">
                    <h6>Monthly Entries</h6>
                    <h3>{{ $monthlyEntries }}</h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">

        <!-- Chart 1 -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Fuel Consumption (Last 6 Weeks)</div>
                <div class="card-body">
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2 -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Fuel Consumption per Vehicle</div>
                <div class="card-body">
                    <canvas id="vehicleChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Weekly Chart
    new Chart(document.getElementById('weeklyChart'), {
        type: 'line',
        data: {
            labels: @json($weeks),
            datasets: [{
                label: 'Liters',
                data: @json($weekFuel),
                borderColor: 'blue',
                backgroundColor: 'lightblue',
                borderWidth: 2,
                fill: true
            }]
        }
    });

    // Vehicle Chart
    new Chart(document.getElementById('vehicleChart'), {
        type: 'bar',
        data: {
            labels: @json($vehicleNames),
            datasets: [{
                label: 'Liters',
                data: @json($vehicleFuel),
                backgroundColor: 'orange'
            }]
        }
    });
</script>

@endsection
