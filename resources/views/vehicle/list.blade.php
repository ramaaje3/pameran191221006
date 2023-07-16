@extends('layouts.admin', ['title' => 'Data Kendaraan'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Data Kendaraan') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('vehicle.create') }}" class="btn btn-primary mb-4">New Kendaraan</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="bg-dark text-light">
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $vehicle->jenis }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('vehicle.edit', $vehicle->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('vehicle.destroy', $vehicle->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- End of Main Content -->
@endsection

@push('notif')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
@endpush
