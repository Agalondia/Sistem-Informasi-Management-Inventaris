@extends('person')
@section('container')
<div class="container-fluid ">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-black">Masukkan Data Barang</h1>
        <a href="/dashboard" class="btn btn-primary">
            <i class="bi bi-door-open-fill"> Kembali</i>            
        </a>
    </div>
</div>

<div class="mt-3 ml-4 mr-4 border-top">
    <form method="post" action="/dashboard/{{ $dashboard->id }}" enctype="multipart/form-data" class="mt-3">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label border-bottom text-black">
                Nama Barang
            </label>

            <input type="text"
                class="
                    form-control
                    @error('nama_barang') is-invalid @enderror"
                id="nama_barang" name="nama_barang" required autofocus value="{{ old('nama_barang', $dashboard->nama_barang) }}">
            @error('nama_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="serial_number_barang" class="form-label border-bottom text-black">
                Serial Number Barang
            </label>

            <input type="text"
                class="
                    form-control
                    @error('serial_number_barang') is-invalid @enderror"
                id="serial_number_barang" name="serial_number_barang" required autofocus value="{{ old('serial_number_barang', $dashboard->serial_number_barang) }}">
            @error('serial_number_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_pembelian" class="form-label border-bottom text-black">
                Tanggal Pembelian
            </label>

            <input type="date"
                class="
                    form-control
                    @error('tanggal_pembelian') is-invalid @enderror"
                id="tanggal_pembelian" name="tanggal_pembelian" required autofocus value="{{ old('tanggal_pembelian', $dashboard->tanggal_pembelian->format('Y-m-d')) }}">
            @error('tanggal_pembelian')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga_barang" class="form-label border-bottom text-black">
                Harga Barang
            </label>

            <input type="text"
                class="
                    form-control
                    @error('harga_barang') is-invalid @enderror"
                id="harga_barang" name="harga_barang" required autofocus value="{{ old('harga_barang', $dashboard->harga_barang) }}">
            @error('harga_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nama_pengguna_barang" class="form-label border-bottom text-black">
                Nama Pengguna Barang
            </label>

            <input type="text"
                class="
                    form-control
                    @error('nama_pengguna_barang') is-invalid @enderror"
                id="nama_pengguna_barang" name="nama_pengguna_barang" required autofocus value="{{ old('nama_pengguna_barang', $dashboard->nama_pengguna_barang) }}">
            @error('nama_pengguna_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-pencil-square">
                Edit Data
            </i>
            
        </button>
    </form>
</div>    
@endsection