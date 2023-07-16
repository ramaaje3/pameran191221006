@extends('layouts.admin', ['title' => 'Ajukan Pemesanan'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Pengajuan Pesanan') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('loan.create') }}" class="btn btn-primary mb-4">Ajukan Pemesanan</a>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

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
                            <form action="{{ route('loan.destroy', $loan->id) }}" method="post">
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
