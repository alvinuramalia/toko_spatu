<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $title = 'produk';
        $cari = $request->input('cari');

        $produk = Produk::when($cari, function ($query, $cari) {
            return $query->where('produk', 'like', "%{$cari}%");
        })->paginate(10);

        return view('produk.index', compact('title','produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produk::create($request->all());
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = Produk::find($request->id);
        $data->produk = $request->produk;
        $data->harga = $request->harga;

        $data->save();

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return redirect()->route('produk.index');

    }
}
