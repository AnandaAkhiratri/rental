<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource 
     */
    public function index()
    {
        $data = [
            'content' => 'admin/mobil/index'
        ];
        $cars = Car::  all();
        
        // Kirim data ke view
        return view('admin.layouts.wrapper',$data, compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'content' => '/admin/mobil/create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage .
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_mobil' => 'required|string|max:255',
            'merek_mobil' => 'required|string|max:255',
            'warna_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255|unique:cars,plat_nomor',
            'harga_sewa_per_hari' => 'required|string|max:255',
        ]);

        
        Car::create($request->all());

        
        return redirect('/admin/mobil/index')->with('message', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $car = Car::findOrFail($id);
        
    
        return view('admin.mobil.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource .
     */
    public function edit($id)
    {
        $data = [
            'content' => 'admin/mobil/edit'
        ];
        
        $car = Car::findOrFail($id);
        
        
        return view('admin.layouts.wrapper',$data, compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'jenis_mobil' => 'required|string|max:255',
            'merek_mobil' => 'required|string|max:255',
            'warna_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255|unique:cars,plat_nomor,' . $id,
            'harga_sewa_per_hari' => 'required|string|max:255',
        ]);

        
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return redirect('/admin/mobil/index')->with('message', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage 
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        
        $car->delete();

        
        return redirect('/admin/mobil/index')->with('message', 'Data Berhasil Dihapus');
    }
}
