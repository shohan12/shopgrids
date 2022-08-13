<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Session;
class CustomerDashboardController extends Controller
{
    public function index()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->simplePaginate(2);
        return view('customer.dashboard.home', ['orders' => $this->orders]);
    }
}
