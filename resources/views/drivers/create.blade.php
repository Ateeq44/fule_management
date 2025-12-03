@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Add New Driver</h2>

    <form action="{{ route('drivers.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label>Driver Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Assign Vehicle</label>
            <select name="assigned_vehicle_id" class="form-control">
                <option value="">Select Vehicle</option>

                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">
                        {{ $vehicle->registration_number }}
                    </option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
