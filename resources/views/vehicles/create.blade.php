@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Add New Vehicle</h2>

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label>Registration Number</label>
            <input type="text" name="registration_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <button class="btn btn-success">Save</button>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>
@endsection
