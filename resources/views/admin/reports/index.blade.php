@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Reports</h2>

    <!-- FILTERS -->
    <div class="card mb-4">
        <div class="card-header">Filter Reports</div>
        <div class="card-body">

            <form method="GET" action="{{ route('admin.reports') }}">

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label>Vehicle</label>
                        <select name="vehicle_id" class="form-control">
                            <option value="">All Vehicles</option>
                            @foreach($vehicles as $v)
                                <option value="{{ $v->id }}">{{ $v->registration_number }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Driver</label>
                        <select name="driver_id" class="form-control">
                            <option value="">All Drivers</option>
                            @foreach($drivers as $d)
                                <option value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control">
                    </div>

                </div>

                <button class="btn btn-primary">Search</button>
            </form>

        </div>
    </div>

    <!-- SUMMARY -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5>Total Liters</h5>
                    <h3>{{ $totalLiters }}</h3>
                </div>
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5>Total Cost</h5>
                    <h3>${{ $totalCost }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- EXPORT BUTTONS -->
    <div class="mb-3 d-flex gap-4">
        <form action="{{ route('admin.reports.pdf') }}" method="GET">
            <input type="hidden" name="vehicle_id" value="{{ request('vehicle_id') }}">
            <input type="hidden" name="driver_id" value="{{ request('driver_id') }}">
            <input type="hidden" name="from_date" value="{{ request('from_date') }}">
            <input type="hidden" name="to_date" value="{{ request('to_date') }}">
            <button type="submit" class="btn btn-primary">Export PDF</button>
        </form>
        <form action="{{ route('admin.reports.excel') }}" method="GET">
            <input type="hidden" name="vehicle_id" value="{{ request('vehicle_id') }}">
            <input type="hidden" name="driver_id" value="{{ request('driver_id') }}">
            <input type="hidden" name="from_date" value="{{ request('from_date') }}">
            <input type="hidden" name="to_date" value="{{ request('to_date') }}">
            <button type="submit" class="btn btn-success">Export Excel</button>
        </form>
        <!-- <a href="{{ route('admin.reports.pdf') }}" class="btn btn-danger">Export PDF</a> -->
        <!-- <a href="{{ route('admin.reports.excel') }}" class="btn btn-success">Export Excel</a> -->

    </div>

    <!-- RESULTS TABLE -->
    <div class="card">
        <div class="card-header">Report Results</div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Vehicle</th>
                        <th>Driver</th>
                        <th>Liters</th>
                        <th>Total Cost</th>
                        <th>Odometer</th>
                        <th>Station</th>
                        <th>Receipt</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{ $entry->date }}</td>
                            <td>{{ $entry->vehicle->registration_number }}</td>
                            <td>{{ $entry->driver->name }}</td>
                            <td>{{ $entry->liters }}</td>
                            <td>${{ $entry->total_cost }}</td>
                            <td>{{ $entry->odometer }}</td>
                            <td>{{ $entry->station_name }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $entry->receipt_image_path) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
