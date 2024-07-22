<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', compact('ekstrakurikulers'));
    }
}
