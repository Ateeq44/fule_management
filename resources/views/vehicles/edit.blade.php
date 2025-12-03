@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Edit Vehicle</h2>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Registration Number</label>
            <input type="text" name="registration_number" class="form-control" value="{{ $vehicle->registration_number }}" required>
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ $vehicle->type }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
