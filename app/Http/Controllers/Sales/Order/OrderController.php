<?php

namespace App\Http\Controllers\Sales\Order;

use App\Models\order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('sales.order.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

     /**
     * show datatable a newly created resource in storage.
     */
    public function datatable()
    {
        $orderData = order::join('customers','orders.customer_id', '=','customers.id')
        ->select('customers.business_name as business_name','orders.order_no','orders.order_date','orders.customer_id')
        ->get();
        return response()->json(['status' => 200, 'data' => $orderData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
