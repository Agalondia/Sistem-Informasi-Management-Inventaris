@extends('person')
@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-black">Dashboard Data Barang</h1>
            @if (session()->has('success'))
                <div class="alert alert-success mb-0" role="alert">
                    {{ session('success') }}
                </div>
            @endif
                
            <a href="/dashboard/create" class="btn btn-primary">
                <i class="bi bi-pencil-fill"> Buat Data Barang Baru</i>
            </a>                             
            {{-- Nilai Penyusutan Barang--}}
            @if ($_REQUEST)
                <form>
                    <div
                        class="input-group">
                        <input
                        id="npb"
                        readonly  
                        class="form-control" 
                        placeholder="Nilai Penyusutan"
                        value="{{ Currency::currency("ASS")->format($_REQUEST['npb']) }}">
                        
                        <button
                            data-clipboard-target="#npb"
                            class="btn btn-primary">
                                <i class="bi bi-clipboard2-plus"> Salin</i>
                        </button>
                    </div>
                </form>
            @else
                <div>
                    <input 
                    placeholder="Nilai Penyusutan"
                    type="text"
                    class="
                    form-control
                    @error('npb') is-invalid @enderror"
                    id="npb" name="npb" readonly required value="{{ old('npb') }}">
                </div>
            @endif
            {{-- End of Nilai Penyusutan Barang--}}
            
            {{-- Search Bar --}}
            <div class="row justify-content-center">
                <form type="get" action="/dashboard">
                    <div class="input-group">
                        <input 
                            type="hidden" 
                            class="form-control" 
                            name="npb"
                            value="0">
                        <input 
                            type="search" 
                            class="form-control" 
                            placeholder="Cari Disini!" 
                            name="search"
                        value="{{ request('search')}}">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"> Cari</i>
                        </button>
                    </div>
                </form>
            </div>
            {{-- End of Search Bar --}}
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-sm mt-3 text-black">
            <thead>
                <tr align="center">
                    <th scope="col">Entri Barang </th>
                    <th scope="col">Nama Barang </th>
                    <th scope="col">Serial Number Barang </th>
                    <th scope="col">Tanggal Pembelian </th>
                    <th scope="col" style="text-align:right">Rp </th>
                    <th scope="col" style="text-align:right">Harga Barang </th>
                    <th scope="col">Nama Pengguna </th>
                    <th scope="col">Pengaturan </th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td align="center" width="7%">{{ $loop->iteration }} </td>
                    <td align="center" width="20%">{{ $item->nama_barang }} </td>
                    <td align="center" width="20%">
                        {{ $item->serial_number_barang }}
                        <form type="get" action="/dashboard2" class="d-inline">
                            <input 
                            type="hidden" 
                            class="form-control" 
                            name="search"
                                    value="{{ $item->serial_number_barang }}">
                                <button
                                    class=" 
                                        badge 
                                        bg-success 
                                        border-0">
                                            <i class="bi bi-zoom-in"> 
                                                Detail
                                            </i>    
                                </button>
                            </form>
                            <form 
                                type="get" 
                                action="/dashboard2/create" 
                                class="d-inline">
                                    <input 
                                        type="hidden" 
                                        name="serial_number_barang"
                                        value="{{ $item->serial_number_barang}}">
                                        <input 
                                        type="hidden"
                                        name="id"
                                        value="{{ $item->id}}">
                                    <button
                                        class=" 
                                            badge 
                                            bg-info 
                                            border-0">
                                            <i class="bi bi-plus-circle">
                                                Service
                                            </i>
                                    </button>
                            </form>
                        </td>
                        <td align="center" width="10%">{{ $item->tanggal_pembelian->format('d M Y') }} </td>
                        @php
                            $age = \Carbon\Carbon::parse($item->tanggal_pembelian)->diff(\Carbon\Carbon::now())->format('%m');
                            $harga_service = 0;
                        @endphp
                        @foreach ($item->dataservicebarang as $service)
                            @php
                                $harga_service += $service->harga_service
                            @endphp
                            
                        @endforeach
                        <td align="center" width="5%">
                            <form action="/dashboard" class="d-inline">
                                <input 
                                    type="hidden" 
                                    class="form-control" 
                                    name="npb"
                                    value="{{ $item->harga_barang - ($item->harga_barang / 60 * $age) - $harga_service }}">
                                <button
                                    class=" 
                                        badge 
                                        bg-success 
                                        border-0">
                                        <i class="bi bi-cash-stack">
                                             NPB    
                                        </i>
                                </button>
                            </form>
                            Rp 
                        </td>
                        <td align="right" width="10%">{{ Currency::currency("IDR")->format($item->harga_barang)  }} </td>
                        <td align="center" width="20%">{{ $item->nama_pengguna_barang }} </td>
                        <td align="center" width="10%">
                            <form class="d-inline" method="post"
                                action="{{ route('dashboard.edit', ['dashboard' => $item->id]) }}">
                                @method('get')
                                @csrf
                                <button
                                    class=" badge 
                                    bg-warning 
                                    border-0">
                                    <i class="bi bi-pencil-square"> Edit</i>
                                </button>
                            </form>

                            <form class="d-inline"
                                action="{{ route('dashboard.destroy', ['dashboard' => $item->id]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button
                                    class="
                                            badge 
                                            bg-danger 
                                            border-0"
                                    onclick="return confirm('Klik OK Untuk Hapus Data')">
                                    <i class="bi bi-trash-fill"> Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
