<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Menggunakan trait HasFactory untuk menghasilkan data awal dan membuat pengujian
    use HasFactory; 

    // Menetapkan nama tabel yang terkait dengan model ini di database
    protected $table = 'products'; 

    // Model 'Product' mewakili entitas produk dalam basis data. Ini adalah turunan dari kelas 'Model' yang disediakan oleh Eloquent ORM.
}


// ambil product dari database