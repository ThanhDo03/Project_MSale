@extends('admin.layout.index')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product for Shopping <i class="fa-sharp fa-solid fa-cart-shopping"></i></h4>
                            <div class="table-responsive">
                                @foreach ($products as $product)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Product </th>
                                                <th> Brand </th>
                                                <th> Price </th>
                                                <th> Image </th>
                                                <th> WareHouse </th>
                                                <th> Type </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $product->product_id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->product_producer }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>
                                                    <img src="{{ asset('image/Product/' . $product->product_image) }}"
                                                        class="mr-2" alt="image">
                                                </td>
                                                <td>{{ $product->product_warehouse }}</td>
                                                <td>{{ $product->product_type	 }}</td>
                                                <td>
                                                    <button style="border: none" class="badge badge-gradient-success">EDIT</button>
                                                    <button style="border: none" class="badge badge-gradient-danger">DELETE</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
