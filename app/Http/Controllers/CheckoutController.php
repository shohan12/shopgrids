<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmationMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;
use Mail;

class CheckoutController extends Controller
{
    private $products;
    private $customer;
    private $order;
    private $orderDetail;
    private $cartProducts;
    private $data;

    public function index()
    {
        return view('front.checkout.checkout');
    }

    public function newOrder(Request $request)
    {
        //return $request->all();

        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = new Customer();
            $this->customer->name       = $request->name;
            $this->customer->email      = $request->email;
            $this->customer->password   = bcrypt($request->mobile);
            $this->customer->mobile     = $request->mobile;
            $this->customer->address    = $request->delivery_address;
            $this->customer->save();

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }

        if ($request->payment_method == 1)
        {
            $this->order = new Order();
            $this->order->customer_id       = $this->customer->id;
            $this->order->order_total       = Session::get('grand_total');
            $this->order->tax_amount        = Session::get('tax_total');
            $this->order->shipping_cost     = Session::get('shipping_total');
            $this->order->order_date        = date('Y-m-d');
            $this->order->order_timestamp   = strtotime(date('Y-m-d'));
            $this->order->payment_type      = $request->payment_method;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->save();

            $this->cartProducts = Cart::getContent();
            foreach ($this->cartProducts as $cartProduct)
            {
                $this->orderDetail = new OrderDetail();
                $this->orderDetail->order_id = $this->order->id;
                $this->orderDetail->product_id = $cartProduct->id;
                $this->orderDetail->product_name = $cartProduct->name;
                $this->orderDetail->product_price = $cartProduct->price;
                $this->orderDetail->product_quantity = $cartProduct->quantity;
                $this->orderDetail->save();
            }

            foreach ($this->cartProducts as $cartProduct)
            {
                Cart::remove($cartProduct->id);
            }

            //=============email send

            $this->data = [
                'title' => 'This is email Title',
                'name'  => $request->name,
                'total' => Session::get('grand_total')
            ];
            Mail::to($request->email)->send(new OrderConfirmationMail($this->data));


            //=============email send


            return redirect('/complete-order')->with('message', "Congratulation ". $this->customer->name ." . Your order post successfully. Please wait. we will contact with you soon.");
        }
        else
        {
            return view('api.online-payment');
        }
    }

    public function completeOrder()
    {
        return view('customer.order.complete-order');
    }

}
