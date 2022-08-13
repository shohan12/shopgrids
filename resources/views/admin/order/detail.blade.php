@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Basic Info</h4>
                    <hr/>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order Id</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{number_format($order->order_total)}}</td>
                        </tr>
                        <tr>
                            <th>Tax Amount</th>
                            <td>{{number_format($order->tax_amount)}}</td>
                        </tr>
                        <tr>
                            <th>Shipping Cost</th>
                            <td>{{number_format($order->shipping_cost)}}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{$order->order_status}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{$order->order_date}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Type</th>
                            <td>{{$order->payment_type == 1 ? 'Cash On Delivery' : 'Online Payment Gateway'}}</td>
                        </tr>
                        <tr>
                            <th>Payment Amount</th>
                            <td>{{number_format($order->payment_amount)}}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$order->payment_date}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{$order->delivery_address}}</td>
                        </tr>
                        <tr>
                            <th>Delivery Date</th>
                            <td>{{$order->delivery_date}}</td>
                        </tr>
                        <tr>
                            <th>Online Transaction Id</th>
                            <td>{{$order->transaction_id}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4>Order Customer Detail</h4>
                    <hr/>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Customer Name </th>
                            <th>Customer Email </th>
                            <th>Customer Mobile </th>
                            <th>Customer Address </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$order->customer->name}}</td>
                            <td>{{$order->customer->email}}</td>
                            <td>{{$order->customer->mobile}}</td>
                            <td>{{$order->customer->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Product Info</h4>
                    <hr/>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$orderDetail->product_id}}</td>
                            <td>{{$orderDetail->product_name}}</td>
                            <td>{{$orderDetail->product_price}}</td>
                            <td>{{$orderDetail->product_quantity}}</td>
                            <td>{{$orderDetail->product_quantity * $orderDetail->product_price}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
