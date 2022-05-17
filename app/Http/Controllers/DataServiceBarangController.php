<?php

namespace App\Http\Controllers;

use Magarrent\LaravelCurrencyFormatter\Facades\Currency;
use App\Models\DataServiceBarang;
use App\Http\Requests\StoreDataServiceBarangRequest;
use App\Http\Requests\UpdateDataServiceBarangRequest;
use Illuminate\Http\Request;

class DataServiceBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard2 = DataServiceBarang::orderBy('tgl_service');

        if(request('search')) {
            $dashboard2
                ->where('serial_number_barang', 'like', '%'. request("search") .'%')
                ->orWhere('keterangan_service', 'like', '%'. request("search") .'%');
        }

        return view('main2', [
            "title" => "Dashboard Data Service",
            'services' => $dashboard2->reorder('tgl_service', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create-service', [
            'title' => "Dashboard Data Service"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDataServiceBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_inventaris' => 'required',
            'serial_number_barang' => 'required',
            'keterangan_service' => 'required',
            'harga_service' => 'required',
            'tgl_service' => 'required'
        ]);


        DataServiceBarang::create($validatedData);

        return redirect('/dashboard2')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataServiceBarang  $dashboard2
     * @return \Illuminate\Http\Response
     */
    public function show(DataServiceBarang $dashboard2)
    {
        return view('create-service', [
            'title' => 'Dashboard Data Service',
            'item' => $dashboard2
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataServiceBarang  $dashboard2
     * @return \Illuminate\Http\Response
     */
    public function edit(DataServiceBarang $dashboard2)
    {
        return view('edit-service', [
            'dashboard2' => $dashboard2,
            'title' => 'Dashboard Data Service',
            'services' => DataServiceBarang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataServiceBarangRequest  $request
     * @param  \App\Models\DataServiceBarang  $dashboard2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataServiceBarang $dashboard2)
    {
        $validatedData2 = $request->validate([
            'serial_number_barang' => 'required',
            'keterangan_service' => 'required',
            'harga_service' => 'required',
            'tgl_service' => 'required'
        ]);

        DataServiceBarang::where('id', $dashboard2->id)->update($validatedData2);
        return redirect('/dashboard2')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataServiceBarang  $dashboard2
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataServiceBarang $dashboard2)
    {
        DataServiceBarang::destroy($dashboard2->id);

        return redirect('/dashboard2')->with('success', 'Data Berhasil Dihapus');
    }
}
