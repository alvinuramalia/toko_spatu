<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $title = 'Home';
        $nama = Auth::user()->admin->nama ;
        // return $nama;
        return view('home', compact('title', 'nama'));

    }

    public function index(Request $request)
    { 
        $title = 'admin';
        $cari = $request->input('cari');

        $admin = Admin::when($cari, function ($query, $cari) {
            return $query->where('nama', 'like', "%{$cari}%")->orWhere('alamat', 'like', "%{$cari}%");
        })->paginate(10);

        return view('admin.index', compact('title','admin'));
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
        Admin::create($request->all());
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $data = Admin::find($request->id);
        $data->nama = $request->nama;
        $data->telephone = $request->telephone;
        $data->alamat = $request->alamat;
        $data->shift = $request->shift;
        $data->save();

        return redirect(route('admin.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Admin::find($id);
        $data->delete();

        return redirect(route('admin.index'));

    }
}
