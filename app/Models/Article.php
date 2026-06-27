<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Menentukan kolom mana saja yang boleh diisi secara massal
    protected $fillable = ['title', 'image', 'content', 'published_at'];
}
