<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataInventaris;
use Illuminate\Support\Carbon;
use App\Models\DataServiceBarang;
use App\Http\Requests\StoreDataInventarisRequest;
use App\Http\Requests\UpdateDataInventarisRequest;
use Magarrent\LaravelCurrencyFormatter\Facades\Currency;

class DataInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard  = DataInventaris::orderBy('tanggal_pembelian');
        $dashboard2 = DataServiceBarang::all();

        if(request('search')) {
            $dashboard
                ->where('nama_barang', 'like', '%'. request("search") .'%')
                ->orWhere('serial_number_barang', 'like', '%'. request("search") .'%')
                ->orWhere('nama_pengguna_barang', 'like', '%'. request("search") .'%');
        }

        return view('main', [
            "title" => "Dashboard Data Barang",
            'items' => $dashboard->reorder('tanggal_pembelian', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create-item', [
            'title' => "Dashboard Data Barang"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataInventarisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'serial_number_barang' => 'required',
            'tanggal_pembelian' => 'required',
            'harga_barang' => 'required',
            'nama_pengguna_barang' => 'required'
        ]);

        DataInventaris::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataInventaris  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(DataInventaris $dashboard)
    {
        return view('create-item', [
            'title' => 'Dashboard Data Barang',
            'item' => $dashboard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataInventaris  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(DataInventaris $dashboard)
    {
        return view ('edit-item', [
            'dashboard' => $dashboard,
            'title' => "Dashboard Data Barang",
            'items' => DataInventaris::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataInventarisRequest  $request
     * @param  \App\Models\DataInventaris  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataInventaris $dashboard)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'serial_number_barang' => 'required',
            'tanggal_pembelian' => 'required',
            'harga_barang' => 'required',
            'nama_pengguna_barang' => 'required'
        ]);

        DataInventaris::where('id', $dashboard->id)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataInventaris  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataInventaris $dashboard)
    {
        DataInventaris::destroy($dashboard->id);

        return redirect('/dashboard')->with('success', 'Data Berhasil Dihapus');
    }

    public function search()
    {
        $search_text = $_GET['query'];
 
        $dashboard = DataInventaris::where('nama_barang', 'like', '%'.$search_text.'%')->with('dashboard')->get();
    
        return view('search', compact('dashboard'));
    }
}
