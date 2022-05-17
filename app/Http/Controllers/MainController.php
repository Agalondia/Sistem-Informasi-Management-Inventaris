<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main', [
            "title" => "Dashboard Data Barang"
        ]);
    }

    public function index2()
    {
        return view('main2', [
            "title" => "Dashboard Data Service"
        ]);
    }
}
