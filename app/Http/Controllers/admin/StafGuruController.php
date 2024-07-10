<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StafGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $file->storeAs('public/photos', $fileName);

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
    public function update(Request $request, StafGuru $stafguru)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama'    => 'required|max:250',
            'jabatan' => 'required',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // nullable karena foto bisa tidak diubah
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error dan input sebelumnya
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('photo')) {
            Storage::delete('public/photos/' . $stafguru->photo);
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/photos', $fileName);
        } else {
            $fileName = $stafguru->photo; // Gunakan nama foto lama jika tidak ada foto baru diunggah
        }

        // Update data staf guru di database
        $stafguru->update([
            'nama'    => $request->nama,
            'jabatan' => $request->jabatan,
            'mapel'   => $request->mapel,
            'photo'   => $fileName, // Simpan nama file foto yang diunggah
        ]);

        // Redirect ke halaman stafguru setelah berhasil diupdate
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StafGuru $stafguru)
    {

        // Hapus foto dari storage jika ada
    if ($stafguru->photo) {
        Storage::delete('public/photos/' . $stafguru->photo);
    }

    // Hapus data dari database
    $stafguru->delete();

    // Redirect atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
