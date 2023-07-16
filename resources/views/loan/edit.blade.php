@extends('layouts.admin', ['title' => 'Edit Pesanan'])

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title ?? __('Edit Pesanan') }}</h1>

    <!-- Main Content goes here -->

    <div class="card">
        <div class="card-body">
            <form action="{{ route('loan.update', $loan->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status_id" class="form-control" @error('status_id') is-invalid @enderror>
                    <option value=""> -Pilih- </option>
                      @foreach ($status as $item)
                      <option value="{{$item->id}}" placeholder="Password">{{$item->nama}}</option>
                      @endforeach
                    </select>
                    @error('status_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure change this status?')">Save</button>
                <a href="{{ route('loan.indexOwner') }}" class="btn btn-default">Back to list</a>

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
