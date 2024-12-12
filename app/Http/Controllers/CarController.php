<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $title = "Car";
        // Kirim data ke view
        return view('admin.layouts.wrapper',$data, compact('cars','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'content' => '/admin/mobil/create'
        ];
        $title = "Car";
        return view('admin.layouts.wrapper', $data,compact('title'));
    }

    /**
     * Store a newly created resource in storage .
     */
    public function store(Request $request)
    {
        // Validasi input
       $data =  $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg',
            'jenis_mobil' => 'required|string|max:255',
            'merek_mobil' => 'required|string|max:255',
            'warna_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255|unique:cars,plat_nomor',
            'harga_sewa_per_hari' => 'required|string|max:255',
        ]);    
        $data['image'] = $request->image->store('car');
        Car::create($data);
        return redirect(route('car.index'))->with('message', 'Data Berhasil Ditambahkan');
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
        $title = "Car";        
        return view('admin.layouts.wrapper',$data, compact('car','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'jenis_mobil' => 'required|string|max:255',
            'merek_mobil' => 'required|string|max:255',
            'warna_mobil' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:255|unique:cars,plat_nomor,' . $id,
            'harga_sewa_per_hari' => 'required|string|max:255',
        ]);        
        $car = Car::findOrFail($id);
        if ($request->image) {
            $data["image"] = $request->image->store('car');
            Storage::delete($car->image);
        }
        $car->update($data);
        return redirect(route('car.index'))->with('message', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage 
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        Storage::delete($car->image);
        
        $car->delete();

        
        return redirect(route('car.index'))->with('message', 'Data Berhasil Dihapus');
    }
}
