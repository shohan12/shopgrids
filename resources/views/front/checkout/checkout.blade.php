@extends('master.front.master')

@section('title')
    Checkout Page
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <form action="{{route('new-order')}}" method="POST">
                            @csrf
                            <ul>
                                <li>
                                    <h6 class="title" aria-expanded="true" aria-controls="collapseThree">Please give your order checkout information </h6>
                                    <section class="checkout-steps-form-content collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="row">
                                        @if (!Session::get('customer_id'))
                                        <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Full Name</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="name" placeholder="Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="email" placeholder="Email Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Phone Number</label>
                                                    <div class="form-input form">
                                                        <input type="text" name="mobile" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                            </div>  
                                        @endif 
                                      
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        <textarea name="delivery_address" placeholder="Delivery Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Select Payment Method</label>
                                                    <div class="">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="1">
                                                            <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="2">
                                                            <label class="form-check-label" for="inlineRadio2">Online</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <input type="submit" value="Confirm Order" class="btn btn-success"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">You Cart Summery</h5>
                            <div class="sub-total-price">
                                @php($total = 0)
                                @foreach($cartProducts as $product)
                                <div class="total-price">
                                    <p class="value">{{$product->name}} - ({{$product->price}} * {{$product->quantity}}):</p>
                                    <p class="price">TK. {{$product->price * $product->quantity}}</p>
                                </div>
                                @php($total = $total + ($product->price * $product->quantity))
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Sub Total:</p>
                                    <p class="price">Tk. {{number_format($total)}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Total (15%):</p>
                                    @php( $tax = round((($total*15)/100)) )
                                    <p class="price">Tk. {{number_format($tax)}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Cost:</p>
                                    @php( $shipping = 100 )
                                    <p class="price">Tk. {{number_format($shipping)}}</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Payable:</p>
                                    @php( $grandTotal =  $total + $tax + $shipping)
                                    <p class="price">Tk. {{number_format($grandTotal)}}</p>
                                    <?php
                                        Session::put('grand_total', $grandTotal);
                                        Session::put('tax_total', $tax);
                                        Session::put('shipping_total', $shipping);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}front/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
