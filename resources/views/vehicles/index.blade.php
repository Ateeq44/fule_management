@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Vehicles</h2>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Registration No</th>
                <th>Model</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->registration_number }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this vehicle?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
