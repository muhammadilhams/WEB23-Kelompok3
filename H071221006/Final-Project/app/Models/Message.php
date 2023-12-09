<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Fix the relationship method
    public function bukti() {
        return $this->belongsTo(Car::class, 'car_image', 'id');
    }
}
