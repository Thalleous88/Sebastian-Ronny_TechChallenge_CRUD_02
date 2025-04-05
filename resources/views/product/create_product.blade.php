<!-- menggunakan layout dari layout.blade.php -->

@extends('layout')

@section('konten')

<!-- create_product page -->
<h4>Insert Product</h4>

<!-- form yang akan disubmit ke route update setelah diisi -->
<!-- form ini menggunakan method post karena digunakan untuk create/membuat dat baru -->
<form action="{{ route('store') }}" method="post">
    <!-- untuk security -->
    @csrf

    <!-- label dan input variabel yang diperlukan -->
    <label>Name</label>
    <input type="text" name="name" class="form-control mb-2">
    <label>Description</label>
    <input type="text" name="description" class="form-control mb-2">
    <label>Quantity</label>
    <input type="number" name="quantity" class="form-control mb-2">
    <label>Price</label>
    <input type="number" name="price" class="form-control mb-2">
    <label>Date</label>
    <input type="date" name="date" class="form-control mb-2">

    <!-- button untuk submit form -->
    <button class="btn btn-primary"> Insert </button>
</form>

<!-- untuk mengecek apakah input ada yang tidak sesuai dengan kondisi yang diatur oleh ProductController, misal tidak mengisi salah satu bagian input atau quantity diisi dengan angka negatif -->
@if ($errors->any()) 
    <div class="w-4/8 m-auto text-center">
        @foreach ($errors->all() as $error)
            <li class="text-red-500 list-none" style="color: red;">
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

@endsection