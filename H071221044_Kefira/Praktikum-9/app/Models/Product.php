<?php

//ini berhubungan dgn migrate
// mengambil nama tabel nya 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded =['id'];
}
