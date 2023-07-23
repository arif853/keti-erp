<?php

namespace App\Http\Controllers\Ledger\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customers = Customer::all();
        return view('ledgerbook.customer.index');
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
        // $customers =Customer::create([
        //     // 'id'=> $request->customer_id,
        //     'reference' => $request->reference,
        //     'credit_limit'=> $request->credit_limit,
        //     'business_name'=> $request->business_name,
        //     'owner_name'=> $request->owner_name,
        //     'phone'=> $request->phone,
        //     'phone2'=> $request->phone2,
        //     'email'=> $request->email,
        //     'bill_address'=> $request->bill_address,
        //     'del_address'=> $request->del_address,
        //     'acc_group'=> $request->acc_group,
        //     'open_balance'=> $request->open_balance,
        //     't_license'=> $request->t_license,
        //     'tin'=> $request->tin_number,
        //     'man_name'=> $request->man_name,
        //     'man_phone'=> $request->man_title,
        //     'man_title'=> $request->man_title,
        // ]);

        $customers = new Customer;
            $customers->reference = $request->reference;
            $customers->credit_limit= $request->credit_limit;
            $customers->business_name= $request->business_name;
            $customers->owner_name= $request->owner_name;
            $customers->phone= $request->phone;
            $customers->phone2= $request->phone2;
            $customers->email= $request->email;
            $customers->bill_address= $request->address;
            $customers->del_address= $request->address2;
            $customers->acc_group= $request->acc_group;
            $customers->open_balance= $request->opening_balance;
            $customers->t_license= $request->t_license;
            $customers->tin= $request->tin_number;
            $customers->man_name= $request->man_name;
            $customers->man_phone= $request->man_phone;
            $customers->man_title= $request->man_title;
            $customers->save();

        return response()->json(['status' => 200, 'message' => 'New customer added successfully!!']);
        // return to_route('ledgerbook.customer.index')->with('success', 'Table created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $customers = Customer::get();

        return response()->json(['status' => '200', 'data' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}

// $customers = new Customer;
//             $customers->reference = $request->reference;
//             $customers->credit_limit= $request->credit_limit;
//             $customers->customer_id= $request->credit_limit;
//             $customers->business_name= $request->credit_limit;
//             $customers->owner_name= $request->credit_limit;
//             $customers->phone= $request->credit_limit;
//             $customers->phone2= $request->credit_limit;
//             $customers->email= $request->credit_limit;
//             $customers->address= $request->credit_limit;
//             $customers->address2= $request->credit_limit;
//             $customers->acc_group= $request->credit_limit;
//             $customers->opening_balance= $request->credit_limit;
//             $customers->t_license= $request->credit_limit;
//             $customers->tin_number= $request->credit_limit;
//             $customers->man_name= $request->credit_limit;
//             $customers->man_phone= $request->status;
//             $customers->man_title= $request->location;
//             $customers->save();
