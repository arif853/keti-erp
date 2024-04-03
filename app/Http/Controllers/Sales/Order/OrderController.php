<?php

namespace App\Http\Controllers\Sales\Order;

use LOG;
use App\Models\order;
use App\Models\Customer;
use App\Models\OrderItem;
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
     * show datatable a newly created resource in storage.
     */
    public function datatable()
    {
        $orderData = order::join('customers','orders.customer_id', '=','customers.id')
        ->select('customers.business_name as customer','orders.order_no','orders.order_date')
        ->get();
        return response()->json(['status' => 200, 'data' => $orderData]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, order $order)
    {
        // $request->validate(
        //     [
        //         'order_date' => 'required',
        //         'order_no' => 'required',
        //         'customer' => 'required',
        //         'quantity' => 'required',
        //         'price' => 'required',
        //     ]
        // );

        if($order->order_no != $request->order_no){

            $orders = new order;
            $orders->order_no= $request->order_no;
            $orders->reference = $request->reference;
            $orders->customer_id= $request->customer;
            $orders->order_date= $request->order_date;
            $orders->subtotal= $request->subtotal;
            $orders->discount= $request->Tdiscount;
            $orders->vat = $request->vat;
            $orders->total= $request->Ftotal;
            $orders->save();

            $orderdata = [];
            for($x = 0; $x <count($request->order); $x++){
                $orderdata[] = [
                    'order_no' => $request->order_no,
                    'items' => $request->order[$x]['items'],
                    'discount' => $request->order[$x]['discount'],
                    'quantity' => $request->order[$x]['quantity'],
                    'price' => $request->order[$x]['price'],
                ];
            }

            OrderItem::insert($orderdata);

        return response()->json(['status' => 200, 'message' => "New Order Added Successfully!"]);

        }else{
            return response()->json(['status' => 404, 'message' => "Order Existed!"]);
        }
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
