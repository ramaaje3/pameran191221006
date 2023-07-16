@extends('layouts.admin', ['title' => 'Pesanan Pending'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Pesanan Pending') }}</h1>

    <!-- Main Content goes here -->

    <table class="table table-bordered table-striped">
        <thead class="bg-dark text-light">
            <tr>
                <th>No</th>
                <th>Driver</th>
                <th>Jenis kendaraan</th>
                <th>Tanggal pinjam</th>
                <th>Batas waktu</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $loan->driver->nama }}</td>
                    <td>{{ $loan->vehicle->jenis }}</td>
                    <td>{{ $loan->tgl_pinjam }}</td>
                    <td>{{ $loan->batas_waktu }}</td>
                    <td>{{ $loan->status->nama }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('loan.edit', $loan->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
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
