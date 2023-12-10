<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'status_payment', 'payment_date', 'gambar_payment'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
