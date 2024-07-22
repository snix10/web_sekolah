<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'ekstrakurikuler',
        'deskripsi',
        'gambar_ekstrakurikuler',
        
    ];
}
