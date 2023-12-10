<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genshin extends Model
{
    use HasFactory;

    protected $fillable = ['karakter', 'role', 'tipe', 'asal', 'deskripsi'];
}
