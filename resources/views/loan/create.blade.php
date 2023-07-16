@extends('layouts.admin' , ['title' => 'New Pesanan'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Ajukan Pemesanan') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('loan.store') }}" method="post">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama Driver</label>
                  <select name="driver_id" class="form-control" @error('driver_id') is-invalid @enderror name="driver_id" id="driver_id">
                    <option value=""> -Pilih- </option>
                    @foreach ($drivers as $driver)
                    <option value="{{$driver->id}}"{{old('driver_id') == $driver->id ? 'selected' : null}}>{{$driver->nama}}</option>
                    @endforeach
                  </select>
                  @error('driver_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                  <label for="nama">Nama Kendaraan</label>
                  <select name="vehicle_id" class="form-control" @error('vehicle_id') is-invalid @enderror name="vehicle_id" id="vehicle_id">
                    <option value=""> -Pilih- </option>
                    @foreach ($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}"{{old('vehicle_id') == $vehicle->id ? 'selected' : null}}>{{$vehicle->jenis}}</option>
                    @endforeach
                  </select>
                  @error('vehicle_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="form-group">
                  <label for="tgl_pinjam">Tanggal Pinjam</label>
                  <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" name="tgl_pinjam" id="tgl_pinjam" placeholder="Tanggal" autocomplete="off" value="{{ old('tgl_pinjam') }}">
                  @error('tgl_pinjam')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="batas_waktu">Batas Waktu</label>
                  <input type="date" class="form-control @error('batas_waktu') is-invalid @enderror" name="batas_waktu" id="batas_waktu" placeholder="Tanggal" autocomplete="off" value="{{ old('batas_waktu') }}">
                  @error('batas_waktu')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <button type="submit" class="btn btn-primary">Save</button>


            </form>
        </div>
    </div>

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
