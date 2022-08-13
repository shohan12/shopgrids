@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Order Info</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Customer Info</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer->name}} ({{$order->customer->mobile}})</td>
                            <td>{{$order->order_total}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->order_status}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>
                                <a href="{{route('admin.order-detail',['id'=>$order->id])}}" class="btn btn-info btn-sm" title="View Order Detail">
                                    <i class="fa fa-book-open"></i>
                                </a>
                                <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-primary btn-sm" title="View Order Invoice">
                                    <i class="fa fa-file-invoice"></i>
                                </a>
                                <a href="{{route('admin.invoice-download', ['id' => $order->id])}}" target="_blank" class="btn btn-warning btn-sm" title="Print/Download Order Invoice">
                                    <i class="fa fa-print"></i>
                                </a>
                                
                                <a href="{{route('admin.order-edit', ['id' => $order->id])}}" class="btn btn-success btn-sm {{$order->order_status == 'Complete' ? 'disabled' : ''}}" title="Edit Order">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('admin.order-delete', ['id' => $order->id])}}" class="btn btn-danger btn-sm {{$order->order_status == 'Cancel' ? '' : 'disabled'}}" title="Delete Order" onclick="return confirm('Are you sure to delete this..');">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
