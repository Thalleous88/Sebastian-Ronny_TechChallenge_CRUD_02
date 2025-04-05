<?php

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
        // membuat table/tabel products
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // menambahkan variabel id
            $table->string('name'); // menambahkan variabel name
            $table->string('description'); // menambahkan variabel description
            $table->integer('quantity'); // menambahkan variabel quantity
            $table->integer('price'); // menambahkan variabel price
            $table->date('date'); // menambahkan variabel date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

     // untuk refresh migration, jika ada table products maka akan didrop/delete/reset
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
