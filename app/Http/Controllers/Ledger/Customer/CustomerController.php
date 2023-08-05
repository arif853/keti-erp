<?php

namespace App\Http\Controllers\Ledger\Customer;

use Log;
use App\Models\Customer;
use App\Models\AccountGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $groups = AccountGroup::all();
        return view('ledgerbook.customer.index',compact('customers','groups'));
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

        $customers = new Customer;
            $customers->reference = $request->ref;
            $customers->credit_limit= $request->credit_lim;
            $customers->business_name= $request->business_name;
            $customers->owner_name= $request->owner_name;
            $customers->phone= $request->phone;
            $customers->phone2= $request->phone2;
            $customers->email= $request->email;
            $customers->del_address= $request->address2;
            $customers->acc_group= $request->acc_group;
            $customers->open_balance= $request->open_balance;
            $customers->t_license= $request->t_license;
            $customers->tin= $request->tin_number;
            $customers->man_name= $request->man_name;
            $customers->man_phone= $request->man_phone;
            $customers->man_title= $request->man_title;
            $customers->save();

        // Customer::create($customerData);

        return response()->json(['status' => 200, 'message' => "New Customer Added Successfully!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $customers = Customer::get();
        return response()->json(['status' => 200, 'data' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        Customer::where('id',$request->id)->update([
            'reference' => $request->ref,
            'credit_limit'=> $request->credit_lim,
            'business_name'=> $request->business_name,
            'owner_name'=> $request->owner_name,
            'phone'=> $request->phone,
            'phone2'=> $request->phone2,
            'email'=> $request->email,
            'del_address'=> $request->address2,
            'acc_group'=> $request->acc_group,
            'open_balance'=> $request->open_balance,
            't_license'=> $request->t_license,
            'tin'=> $request->tin_number,
            'man_name'=> $request->man_name,
            'man_phone'=> $request->man_phone,
            'man_title'=> $request->man_title,
        ]);

        // $customer->update($customerData);
        return response()->json(['status' => 200, 'message' => "Customer Updated Successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $customer= Customer::find($id);

        Customer::destroy($id);

    }
}
