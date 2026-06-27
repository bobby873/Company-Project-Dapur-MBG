<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Daftarkan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = ['name', 'total_porsi', 'image'];
}
