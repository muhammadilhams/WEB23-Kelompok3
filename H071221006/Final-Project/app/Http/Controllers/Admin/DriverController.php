<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\DriverStoreRequest;
use App\Http\Requests\Admin\DriverUpdateRequest;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::latest()->get();
        return view('admin.drivers.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverStoreRequest $request) {
        if ($request->validated()) {
            $slug = Str::slug($request->nama_driver, '-');

            $gambar_sim = $request->file('gambar_sim')->store('assets/driver', 'public');
            $gambar_driver = $request->file('gambar_driver')->store('assets/driver1', 'public');

            Driver::create([
                'nama_driver' => $request->nama_driver,
                'gender' => $request->gender,
                'usia' => $request->usia,
                'gambar_sim' => $gambar_sim,
                'gambar_driver' => $gambar_driver,
                'status' => $request->status,
                'deskripsi' => $request->deskripsi,
                'slug' => $slug,
            ]);
        }

        return redirect()->route('drivers.index')->with([
            'message' => 'Data sukses dibuat',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverUpdateRequest $request, Driver $driver)
    {
        if($request->validated()) {
            $slug = Str::slug($request->nama_driver, '-');
            $driver->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('drivers.index')->with([
            'message' => 'Data berhasil diedit',
            'alert-type' => 'info'
        ]);
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
    // Hapus gambar sebelum menghapus driver
    if($driver->gambar_sim) {
        Storage::delete($driver->gambar_sim);
    }
    if($driver->gambar_driver) {
        Storage::delete($driver->gambar_driver);
    }

    // Hapus driver dari database
    $driver->delete();

    return redirect()->back()->with([
        'message' => 'Data berhasil dihapus',
        'alert-type' => 'danger'
    ]);
    }


    public function updateImage(Request $request, $driverId) {
        $request->validate([
            'gambar_sim' => 'required|image',
            'gambar_driver' => 'required|image',
        ]);
    
        $driver = Driver::findOrFail($driverId);
    
        $gambar_sim = $request->file('gambar_sim')->store('assets/driver', 'public');
        $gambar_driver = $request->file('gambar_driver')->store('assets/driver1', 'public');
    
        $driver->update([
            'gambar_sim' => $gambar_sim,
            'gambar_driver' => $gambar_driver,
        ]);
    
        return redirect()->back()->with([
            'message' => 'Gambar berhasil diedit',
            'alert-type' => 'info'
        ]);        
    }
    
}
