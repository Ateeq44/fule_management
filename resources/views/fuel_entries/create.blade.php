@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Add Fuel Entry</h2>

    <form action="{{ route('fuel_entries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Vehicle</label>
                <select name="vehicle_id" class="form-control" required>
                    <option value="">Select Vehicle</option>
                    @foreach($vehicles as $v)
                        <option value="{{ $v->id }}">{{ $v->registration_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Driver</label>
                <select name="driver_id" class="form-control" required>
                    <option value="">Select Driver</option>
                    @foreach($drivers as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Liters</label>
            <input type="number" step="0.01" name="liters" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total Cost</label>
            <input type="number" step="0.01" name="total_cost" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Odometer Reading</label>
            <input type="number" name="odometer" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Station Name</label>
            <input type="text" name="station_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Receipt</label>
            <input type="file" name="receipt_image" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('fuel_entries.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
