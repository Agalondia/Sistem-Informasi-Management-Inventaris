@extends('person')
@section('container')
<div class="container-fluid ">
    <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-black">Masukkan Data Service</h1>
        <a href="/dashboard2" class="btn btn-primary">
            <i class="bi bi-door-open-fill"></i>
            Kembali
        </a>
    </div>
</div>

    <div class="mt-3 ml-4 mr-4 border-top">
        <form method="post" action="{{ route('dashboard2.store') }}" enctype="multipart/form-data" class="mt-3">
            @csrf
            <input 
                                        type="hidden" 
                                        name="id_inventaris"
                                        value="{{ $_REQUEST['id'] }}">
            <div class="mb-3">
                <label for="serial_number_barang" class="form-label border-bottom text-black">
                    Serial Number Barang
                </label>
    
                <input type="text"
                    class="
                        form-control
                        @error('serial_number_barang') is-invalid @enderror"
                    id="serial_number_barang" 
                    name="serial_number_barang" 
                    readonly required 
                    value="{{ old('serial_number_barang', $_REQUEST['serial_number_barang']) }}">

                @error('serial_number_barang')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="keterangan_service" class="form-label border-bottom text-black">
                    Keterangan Service
                </label>
    
                <input type="text"
                    class="
                        form-control
                        @error('keterangan_service') is-invalid @enderror"
                    id="keterangan_service" name="keterangan_service" required autofocus value="{{ old('keterangan_service') }}">
                @error('keterangan_service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="harga_service" class="form-label border-bottom text-black">
                    Harga Service
                </label>
    
                <input type="text"
                    class="
                        form-control
                        @error('harga_service') is-invalid @enderror"
                    id="harga_service" name="harga_service" required value="{{ old('harga_service') }}">
                @error('harga_service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_service" class="form-label border-bottom text-black">
                    Tanggal Service
                </label>
    
                <input type="date"
                    class="
                        form-control
                        @error('tgl_service') is-invalid @enderror"
                    id="tgl_service" name="tgl_service" required value="{{ old('tgl_service') }}">
    
                @error('tgl_service')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>    
            <button type="submit" class="btn btn-primary">Buat Data</button>
        </form>
    </div>    
</div>
@endsection
