@extends('customer.layout.index')
@section('content')
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay">
                        @foreach ($cart_items as $data)
                            <div class="cart-list">

                                <div class="single-cart-item">
                                    <a href="#" class="product-image">
                                        <img src="img/product-img/product-1.jpg" class="cart-thumb" alt="">

                                        <div class="cart-item-desc">
                                            <span class="product-remove"><i class="fa fa-close"
                                                    aria-hidden="true"></i></span>
                                            <span class="badge">{{ $data->customer_id }}</span>
                                            <h6>Button Through Strap Mini Dress</h6>
                                            <p class="size">Size: S</p>
                                            <p class="color">Color: Red</p>
                                            <p class="price">$45.00</p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
