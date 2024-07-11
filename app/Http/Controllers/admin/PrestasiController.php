<?php

namespace App\Http\Controllers\admin;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasisekolah = Prestasi::all();
        return view('admin.prestasi', compact('prestasisekolah'));
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
            'kejuaraan'          => 'required|max:250',
            'keterangan'         => 'required',
            'sumber'             => 'required',
            'gambarprestasi'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        

        // Proses penyimpanan file gambar
        $file = $request->file('gambarprestasi');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/gambarprestasi', $fileName);

        // Simpan data staf guru ke database
        Prestasi::create([
            'kejuaraan'          => $request->kejuaraan,
            'keterangan'         => $request->keterangan,
            'sumber'             => $request->sumber,
            'gambarprestasi'     => $fileName, // Simpan nama file foto yang diunggah
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $Prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $Prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $Prestasi)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kejuaraan'        => 'required|max:250',
            'keterangan'       => 'required',
            'sumber'           => 'required',
            'gambarprestasi'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // nullable karena foto bisa tidak diubah
        ]);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error dan input sebelumnya
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('gambarprestasi')) {
            Storage::delete('public/gambarprestasi/' . $Prestasi->gambarprestasi);
            $file = $request->file('gambarprestasi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gambarprestasi', $fileName);
        } else {
            $fileName = $Prestasi->photo; // Gunakan nama foto lama jika tidak ada foto baru diunggah
        }

        // Update data staf guru di database
        $Prestasi->update([
            'kejuaraan'        => $request->kejuaraan,
            'keterangan'       => $request->keterangan,
            'prestasi'         => $request->prestasi,
            'gambarprestasi'   => $fileName, // Simpan nama file foto yang diunggah
        ]);

        // Redirect ke halaman stafguru setelah berhasil diupdate
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $Prestasi)
    {

        // Hapus foto dari storage jika ada
    if ($Prestasi->photo) {
        Storage::delete('public/gambarprestasi/' . $Prestasi->photo);
    }

    // Hapus data dari database
    $Prestasi->delete();

    // Redirect atau tampilkan pesan sukses
    return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

