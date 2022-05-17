@extends('person')
@section('container')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-black">Dashboard Data Service</h1>
            @if (session()->has('success'))
                <div class="alert alert-success mb-0" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Search Bar --}}
            <div class="row justify-content-center">
                <form type="get" action="/dashboard2">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Cari Disini!" name="search" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"> Cari</i>
                        </button>
                    </div>
                </form>
            </div>
            {{--End of Search Bar --}}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm mt-3 text-black">
            <thead>
                <tr align="center">
                    <th scope="col">Entri Service          </th> 
                    <th scope="col">Serial Number Barang   </th> 
                    <th scope="col">Keterangan Service     </th>
                    <th scope="col">Rp </th> 
                    <th scope="col" style="text-align:right">Harga Service          </th> 
                    <th scope="col">Tanggal Service        </th> 
                    <th scope="col">Pengaturan             </th> 
                </tr>
            </thead>

            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td align="center" width="7%">{{ $loop->iteration }}                       </td> 
                        <td align="center" width="20%">
                            {{ $service->serial_number_barang }}
                            @if (request('search'))
                                <form type="get" action="/dashboard2" class="d-inline">
                                    <button
                                        class=" 
                                            badge 
                                            bg-success 
                                            border-0">
                                                <i class="bi bi-zoom-out"> 
                                                    Detail
                                                </i>    
                                    </button>
                                </form> 
                            @else
                                    <form type="get" action="/dashboard2" class="d-inline">
                                        <input 
                                            type="hidden" 
                                            class="form-control" 
                                            name="search"
                                            value="{{ $service->serial_number_barang }}">
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
                            @endif
                               
                        </td> 
                        <td align="center" width="20%">{{ $service->keterangan_service }} </td>
                        <td align="center" width="2%">Rp </td> 
                        <td align="right" width="10%">{{ Currency::currency("IDR")->format($service->harga_service)  }} </td> 
                        <td align="center" width="10%">{{ $service->tgl_service->format('d M Y') }} </td>
                        <td align="center" width="10%">
                            <form 
                                class="d-inline"
                                method="post"
                                action="{{ route('dashboard2.edit', ["dashboard2" => $service->id]) }}">
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
                                action="{{ route('dashboard2.destroy', ['dashboard2' => $service->id]) }}" method="post">
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
