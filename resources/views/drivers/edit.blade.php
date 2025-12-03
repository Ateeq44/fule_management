@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Edit Driver</h2>

    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Driver Name</label>
            <input type="text" name="name" class="form-control" value="{{ $driver->name }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $driver->phone }}" required>
        </div>

        <div class="mb-3">
            <label>Assign Vehicle</label>
            <select name="assigned_vehicle_id" class="form-control">
                
                <option value="">No Vehicle</option>

                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" 
                        {{ $driver->assigned_vehicle_id == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->registration_number }}
                    </option>
                @endforeach

            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
