<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafGuru extends Model
{
    // public $table = "bukus";

    use HasFactory;
    protected $fillable = [
        'nama',
        'photo',
        'jabatan',
        'mapel',
    ];
}
