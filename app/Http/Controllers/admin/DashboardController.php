<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\StafGuru;

class DashboardController extends Controller
{
    public function index()
    {
        $stafgurus = StafGuru::paginate();
        $prestasis = Prestasi::paginate();

        return view('admin.dashboard', compact('stafgurus', 'prestasis'));
    }

}
