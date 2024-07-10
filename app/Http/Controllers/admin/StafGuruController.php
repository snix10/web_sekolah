<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StafGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StafGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stafgurus = StafGuru::all();
        return view('admin.stafguru', compact('stafgurus'));
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

        
        $validator = Validator::make($request->all(), [
            'nama'         => 'required|max:250',
            'jabatan'      => 'required',
            'photo'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        // Proses penyimpanan file gambar
        $file = $request->file('photo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/asset_web_sekolah/photos', $fileName);

        // Simpan data staf guru ke database
        StafGuru::create([
            'nama'      => $request->nama,
            'jabatan'   => $request->jabatan,
            'mapel'     => $request->mapel,
            'photo'     => $fileName, // Simpan nama file foto yang diunggah
        ]);

        return redirect('/stafguru');
    }

    /**
     * Display the specified resource.
     */
    public function show(StafGuru $stafGuru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StafGuru $stafGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StafGuru $stafGuru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StafGuru $stafGuru)
    {
        //
    }
}
