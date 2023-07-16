@extends('layouts.admin', ['title' => 'Data Pemesanan'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Pesanan Disetujui') }}</h1>

    <!-- Main Content goes here -->

    <a href="{{ route('loan.export') }}" class="btn btn-success mb-4">Export</a>

    <table class="table table-bordered table-striped">
        <thead class="bg-dark text-light">
            <tr>
                <th>No</th>
                <th>Driver</th>
                <th>Jenis kendaraan</th>
                <th>Tanggal pinjam</th>
                <th>Batas waktu</th>
                <th>Status</th>
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
