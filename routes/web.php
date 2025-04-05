<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

// route ke view welcome.blade.php dapat diakses dengan localhost URL/
Route::get('/', function () {
    return view('welcome');
});

// route untuk function create dalam ProductController dapat diakses dengan localhost URL/products/create
// menggunakan method get karena dalam hal ini kita ingin mengambil data yang diinput user
Route::get('/products/create', [ProductController::class, 'create'])->name('create');

// route untuk function store dalam ProductController dapat diakses dengan localhost URL/products/submit
// menggunakan method post karena dalam hal ini kita ingin menyimpan data yang telah diinput user
Route::post('/products/submit', [ProductController::class, 'store'])->name('store');

// route untuk function edit dalam ProductController dapat diakses dengan localhost URL/products/{product}/edit
// menggunakan method get karena dalam hal ini kita ingin mengambil data yang diinput user
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit');

// route untuk function update dalam ProductController dapat diakses dengan localhost URL/products/{product}
// menggunakan method put karena dalam hal ini kita ingin memperbarui data produk dengan data produk yang baru yang telah diinput user
Route::put('/products/{product}', [ProductController::class, 'update'])->name('update');

// route untuk function destroy dalam ProductController dapat diakses dengan localhost URL/products/delete/{product}
// menggunakan method delete karena dalam hal ini kita ingin menghapus data produk tersebut
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('destroy');

// route untuk function view dalam ProductController dapat diakses dengan localhost URL/products
// menggunakan method get karena dalam hal ini kita ingin mengambil data-data produk dari tabel products
Route::get('/products', [ProductController::class, 'view'])->name('view');

