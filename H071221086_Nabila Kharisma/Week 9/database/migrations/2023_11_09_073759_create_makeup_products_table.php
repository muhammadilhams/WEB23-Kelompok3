<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMakeupProductsTable extends Migration
{
    public function up() //fungsi yg akan terjadi ketika kita migrate
    {
        Schema::create('makeup_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('brand');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('makeup_products');
    }
}
