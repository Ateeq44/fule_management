@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Edit Fuel Entry</h2>

    <form action="{{ route('fuel_entries.update', $fuel_entry->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Vehicle</label>
                <select name="vehicle_id" class="form-control" required>
                    @foreach($vehicles as $v)
                        <option value="{{ $v->id }}" 
                            {{ $fuel_entry->vehicle_id == $v->id ? 'selected' : '' }}>
                            {{ $v->registration_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Driver</label>
                <select name="driver_id" class="form-control" required>
                    @foreach($drivers as $d)
                        <option value="{{ $d->id }}" 
                            {{ $fuel_entry->driver_id == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $fuel_entry->date }}" required>
        </div>

        <div class="mb-3">
            <label>Liters</label>
            <input type="number" step="0.01" name="liters" class="form-control" value="{{ $fuel_entry->liters }}" required>
        </div>

        <div class="mb-3">
            <label>Total Cost</label>
            <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ $fuel_entry->total_cost }}" required>
        </div>

        <div class="mb-3">
            <label>Odometer Reading</label>
            <input type="number" name="odometer" class="form-control" value="{{ $fuel_entry->odometer }}" required>
        </div>

        <div class="mb-3">
            <label>Station Name</label>
            <input type="text" name="station_name" class="form-control" value="{{ $fuel_entry->station_name }}" required>
        </div>

        <div class="mb-3">
            <label>Upload Receipt (optional)</label>
            <input type="file" name="receipt_image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Current Receipt:</label><br>
            <a href="{{ asset('storage/' . $fuel_entry->receipt_image_path) }}" target="_blank">
                <img src="{{ asset('storage/' . $fuel_entry->receipt_image_path) }}" 
                     alt="Receipt" width="150" class="img-thumbnail">
            </a>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('fuel_entries.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
