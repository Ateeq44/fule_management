@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Drivers</h2>
        <a href="{{ route('drivers.create') }}" class="btn btn-primary">Add Driver</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Driver Name</th>
                <th>Phone</th>
                <th>Assigned Vehicle</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->phone }}</td>
                    <td>{{ $driver->vehicle->registration_number ?? 'Not Assigned' }}</td>

                    <td>
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this driver?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
