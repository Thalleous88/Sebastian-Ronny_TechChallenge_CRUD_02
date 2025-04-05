<!-- menggunakan layout dari layout.blade.php -->
@extends('layout')

@section('konten')

<!-- product_list page -->
<div class="d-flex">
    <h4>Product List</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('create') }}">Add Product</a>
    </div>
</div>

<!-- table/tabel untuk mendisplay data-data produk -->
<table class="table">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Date</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->quantity }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->date }}</td>
        <td>
            <!-- button edit untuk mengedit variabel-variabel produk yang ketika diklik akan mengarahkan ke edit page & mengepass id dari produk -->
            <a href="{{ route('edit', $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
            <br>

            <!-- button delete untuk mendelete produk dengan mengarahkan ke route destroy dan mengpass id dari produk -->
            <form action="{{ route('destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form> 
        </td>
    </tr>
    @endforeach
</table>

@endsection