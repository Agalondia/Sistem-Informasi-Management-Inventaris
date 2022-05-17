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

            {{-- Search Bar --}}
            <div class="row justify-content-end">
                <div>
                    <form type="get" action="{{ url('/search') }}">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Cari Disini!" name="query" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"> Cari</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{--End of Search Bar --}}

            <a href="/dashboard/create" class="btn btn-primary">
                <i class="bi bi-pencil-fill"> Buat Data Barang Baru</i>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm mt-3 text-black">
            <thead>
                <tr>
                    <th scope="col">Entri Barang                </th> 
                    <th scope="col">Nama Barang                 </th> 
                    <th scope="col">Serial Number Barang        </th> 
                    <th scope="col">Tanggal Pembelian           </th> 
                    <th scope="col">Harga Barang                </th> 
                    <th scope="col">Nama Pengguna               </th> 
                    <th scope="col">Pengaturan                  </th> 
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}                               </td> 
                        <td>{{ $item->nama_barang }}                             </td> 
                        <td>
                            {{ $item->serial_number_barang }}
                            <form 
                                class="d-inline"
                                method="post"
                                action="{{ route('dashboard.edit', ["dashboard" => $item->id]) }}">
                                @method('get')
                                @csrf
                                <button
                                    class=" badge 
                                    bg-success 
                                    border-0">
                                    <i class="bi bi-zoom-in"> Detail</i>
                                </button>
                            </form>
                        </td> 
                        <td>{{ $item->tanggal_pembelian->format('d M Y') }}      </td> 
                        <td>{{ $item->harga_barang }}                            </td> 
                        <td>{{ $item->nama_pengguna_barang }}                    </td> 
                        <td>
                            <form 
                                class="d-inline"
                                method="post"
                                action="{{ route('dashboard.edit', ["dashboard" => $item->id]) }}">
                                @method('get')
                                @csrf
                                <button
                                    class=" badge 
                                    bg-warning 
                                    border-0">
                                    <i class="bi bi-pencil-square"> Edit</i>
                                </button>
                            </form>

                            <form 
                                class="d-inline"
                                action="{{ route('dashboard.destroy', ["dashboard" => $item->id]) }}"
                                method="post">
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
