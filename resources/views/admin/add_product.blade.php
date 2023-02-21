@extends('admin.layout.index')
@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Management Team</h4>
                        <p class="card-description"> + Upload Product </p>
                        <form class="forms-sample" method="POST" enctype="multipart/form-data" action="{{route('add.product')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">ID</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="ID" name="id_product">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name_product">
                            </div>
                            <div class="form-group">    
                                <label for="exampleInputEmail3">Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Price" name="price_product">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Brand</label>
                                <select class="form-control" id="exampleSelectGender" name="brand_product">
                                    <option>Nike</option>
                                    <option>Adidas</option>
                                    <option>Vans</option>
                                    <option>MLB</option>
                                    <option>MLB</option>
                                    <option>New Balance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Type</label>
                                <select class="form-control" id="exampleSelectGender" name="type_product">
                                    <option>Shoes</option>
                                    <option>Shirt</option>
                                    <option>Trousers</option>
                                    <option>Clothes</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image_product" class="form-control"  name="image_product"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">WareHouse</label>
                                <select class="form-control" id="exampleSelectGender"  name="whouse_product">
                                    <option>Ha Noi</option>
                                    <option>Bac Giang</option>
                                    <option>Bac Ninh</option>
                                    <option>Da Nang</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea1">Descripsion</label>
                                <textarea class="form-control" id="exampleTextarea1" rows="4" name="des_product"></textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
