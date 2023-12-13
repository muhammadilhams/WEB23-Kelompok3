<?php


//migrations digunakan utk membuat tabel berdasarkan model 
// Migrasi digunakan untuk mengelola struktur database dalam proyek Laravel 
// php artisan migrate == tmbhkan tabel
//                    :rollback == menghapus tabel
//                    :fresh == menghapus tabel dan menambahkan tabel baru 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->string('jenis');
            $table->text('deskripsi');
            $table->string('image');
            $table->timestamps();
            //Metode timestamps akan scr otomatis menambahkan dua kolom, yaitu created_at dan updated_at,
            //yang akan digunakan untuk melacak waktu pembuatan dan pembaruan setiap entri dalam tabel.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    //metode down, jika perlu melakukan rollback migrasi, tabel "products" akan dihapus dari database.
    {
        Schema::dropIfExists('products');
    }

};
