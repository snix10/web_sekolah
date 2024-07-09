<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\StafGuru;
use Illuminate\Http\Request;

class StafGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stafguru', [

            'stafgurus' => StafGuru::all(),
            
            
        ]);
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
        //
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
