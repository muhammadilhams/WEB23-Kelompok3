<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoesProduct extends Model
{
    protected $fillable = ['brand', 'size', 'price','stock']; //menentukan tabel bisa diisi dengan massal (mass assignable)
    use HasFactory;
}
