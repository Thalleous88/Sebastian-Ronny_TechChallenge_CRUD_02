<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // fungsi view untuk mengarahkan user ke page product_list
    public function view()
    {
        // Product:all() berguna untuk mengambil data produk dari table yang ada di database dan menjadikannya dalam bentuk collection
        $products = Product::all(); 
        // mengarahkan user ke page product_list dan juga mengpass data-data produk yang sudah diambil
        return view('product.product_list', compact('products'));
    }

    //fungsi create untuk mengarahkan user ke page create_product
    public function create()
    {
        // mengarahkan user ke page create_product
        return view('product.create_product');
    }

    // fungsi store untuk menyimpan data-data yang telah diinput oleh user
    public function store(Request $request) 
    {

        // $request->validate untuk mengvalidasi input yang diberikan user
        $request->validate([
            'name' => 'required|string', // artinya name harus diisi (tidak boleh kosong) dan inputnya harus berupa string
            'description' => 'required|string', // artinya description harus diisi (tidak boleh kosong) dan inputnya harus berupa string
            'quantity' => 'required|integer|min:1', // artinya quantity harus diisi (tidak boleh kosong) dan inputnya harus berupa integer serta minimum angkanya adalah 1
            'price' => 'required|integer|min:0', // artinya price harus diisi (tidak boleh kosong) dan inputnya harus berupa integer serta minimum angkanya adalah 0
            'date' => 'required|date' // artinya date harus diisi (tidak boleh kosong) dan inputnya harus berupa date/tanggal
        ]);


        // membuat instance/produk baru yang awalnya kosong
        $product = new Product();

        // $request untuk user input setiap variabel yang dimiliki produk 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->date = $request->date;

        // save/menyimpan produk baru tersebut yang telah diisi
        $product->save();

        // mengarahkan user ke route view dan juga ada success messagenya apabila produk telah berhasil dibuat
        return redirect()->route('view')->with('success', 'Product is created');
    }

    // function edit untuk mengarahkan user ke page update_product
    public function edit(Product $product) 
    {
        // mengarahkan user ke page update_product
        return view('product.update_product', compact('product'));
    }

    // function update untuk mengupdate data produk yang sudah ada dan menyimpannya
    public function update(Request $request, Product $product)
    {
        // $request->validate untuk mengvalidasi input yang diberikan user
        $request->validate([
            'name' => 'required|string', // artinya name harus diisi (tidak boleh kosong) dan inputnya harus berupa string
            'description' => 'required|string', // artinya description harus diisi (tidak boleh kosong) dan inputnya harus berupa string
            'quantity' => 'required|integer|min:1', // artinya quantity harus diisi (tidak boleh kosong) dan inputnya harus berupa integer serta minimum angkanya adalah 1
            'price' => 'required|integer|min:0', // artinya price harus diisi (tidak boleh kosong) dan inputnya harus berupa integer serta minimum angkanya adalah 0
            'date' => 'required|date' // artinya date harus diisi (tidak boleh kosong) dan inputnya harus berupa date/tanggal
        ]);

        // mengambil produk dan data-datanya berdasarkan id yang dimiliki produk tersebut
        $product = Product::find($product->id);

         // $request untuk user input setiap variabel yang dimiliki produk 
         $product->name = $request->name;
         $product->description = $request->description;
         $product->quantity = $request->quantity;
         $product->price = $request->price;
         $product->date = $request->date;
 
         // save/menyimpan produk baru tersebut yang telah diisi
         $product->save();
        
        // mengarahkan user ke route view dan juga ada success messagenya apabila produk telah berhasil diupdate/diperbarui
        return redirect()->route('view')->with('success', 'Product is updated');
    }

    // function untuk delete/hapus data produk
    public function destroy(Product $product)
    {
        // delete() untuk delete produk dari tabel & database
        $product->delete();

        // mengarahkan user ke route view dan juga ada success messagenya apabila produk telah berhasil didelete/dihapus
        return redirect()->route('view')->with('success', 'Product is deleted');
    }
}
