@extends('master.front.master')


@section('title')
Cart page
@endsection


@Section('body')
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index.html">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
        <h4 class="my-3 text-center">{{Session::get('message')}}</h4>
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Unit Price</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Total Price</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>


            @php($total = 0)
            @foreach($products as $product)
            <div class="cart-single-list">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-md-1 col-12">
                        <a href="">
                            <img src="{{asset($product->attributes->image)}}" alt="#">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <h5 class="product-name"><a href="product-details.html">
                                {{$product->name}}</a></h5>
                        <p class="product-des">
                            <span><em>Type:</em> Mirrorless</span>
                            <span><em>Color:</em> Black</span>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <div class="count-input">
                            <form action="{{route('update-cart-product', ['id' => $product->id])}}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="qty" value="{{$product->quantity}}" min="1" />
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{$product->price}}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{$product->quantity * $product->price}}</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a class="remove-item" href="{{route('delete-cart-product', ['id' => $product->id])}}" onclick="return confirm('Are you sure to delete this..');"><i class="lni lni-close"></i></a>
                    </div>
                </div>
            </div>
            @php($total = $total + ($product->quantity * $product->price))
            @endforeach


        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                            <ul>
                                       <li>Cart Subtotal<span>{{number_format($total)}}</span></li>
                                        @php($tax = round((($total*7.5)/100)))
                                        <li>Tax Amount<span>{{ number_format($tax)  }}</span></li>
                                        <li>Shipping<span>{{$shipping = 100}}</span></li>
                                        @php($grandTotal = $total + $tax + $shipping)
                                        <li class="last">Total Payable<span>{{ number_format($grandTotal) }}</span></li>
                                    </ul>
                                <div class="button">
                                    <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                    <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection