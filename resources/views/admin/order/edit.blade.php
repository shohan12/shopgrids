@extends('master.admin.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Order Info</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <form action="{{route('admin.order-update', ['id' => $order->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Total</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$order->order_total}}" name="order_total" readonly id="horizontal-firstname-input"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Delivery Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="delivery_address" id="horizontal-email-input">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Order Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="order_status" required>
                                    <option value="" disabled selected> -- Select Order Status -- </option>
                                    <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}> Pending </option>
                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing </option>
                                    <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}}> Complete </option>
                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}> Cancel </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Payment Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$order->order_total}}" name="payment_amount" id="horizontal-firstname-input"/>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Payment Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="payment_status" required>
                                    <option value="" disabled selected> -- Select Payment Status -- </option>
                                    <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}> Pending </option>
                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing </option>
                                    <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}}> Complete </option>
                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}}> Cancel </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update Order Info</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
