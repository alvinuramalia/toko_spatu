<?php

namespace App\Http\Controllers;

use App\Models\Datajual;
use App\Models\Produk;
use App\Models\Admin;
use Illuminate\Http\Request;

class DatajualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'datajual';
        $cari = $request->input('cari');

        $datajual = Datajual::when($cari, function ($query, $cari) {
            return $query->where('costumer', 'like', "%{$cari}%");
        })->paginate(10);

        return view('datajual.index', compact('title','datajual'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produkList = Produk::all();
        $adminList = Admin::all();
        $title = "Tambah datajual";
        return view('datajual.create', compact('produkList', 'adminList','title'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $harga = Produk::where('id', $request->produk_id)->first()->harga;
        $total = $request->jumlah * $harga;
    
        $datajual = new Datajual;
        $datajual->tanggal = $request->tanggal;
        $datajual->costumer = $request->costumer;
        $datajual->produk_id = $request->produk_id;
        $datajual->jumlah = $request->jumlah;
        $datajual->total_jumlah = $total;
        $datajual->admin_id = $request->admin_id;
        $datajual->save();
    
        return redirect()->route('datajual.index')->with('success', 'Data penjualan berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Show datajual";
        $data = Datajual::find($id);
        // $produkList = Produk::all();
        // $adminList = Admin::all();

        return view('datajual.show', compact('data','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Edit datajual";
        $data = Datajual::find($id);
        $produkList = Produk::all();
        $adminList = Admin::all();

        return view('datajual.edit', compact('data','title', 'produkList', 'adminList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $harga = Produk::where('id', $request->produk_id)->first()->harga;
        $total = $request->jumlah * $harga;
    
        $datajual = Datajual::find($id);
        $datajual->tanggal = $request->tanggal;
        $datajual->costumer = $request->costumer;
        $datajual->produk_id = $request->produk_id;
        $datajual->jumlah = $request->jumlah;
        $datajual->total_jumlah = $total;
        $datajual->admin_id = $request->admin_id;
        $datajual->save();
    
        return redirect()->route('datajual.index')->with('success', 'Data penjualan berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Datajual::find($id);
        $data->delete();

        return redirect()->route('datajual.index');
    }
}
