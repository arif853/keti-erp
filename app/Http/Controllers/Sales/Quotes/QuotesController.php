<?php

namespace App\Http\Controllers\Sales\Quotes;

use App\Http\Controllers\Controller;
use App\Models\quote;
use App\Models\Customer;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('sales.quotes.index',compact('customer'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(quote $quote)
    {
        $q_no = $request->quotation_no;

        $quotation = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->join('customers','quotes.customer_id', '=','customers.id')
                ->select('quotes.*','quote_items.*','customers.business_name','customers.del_address','customers.phone','customers.phone2','customers.email')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();

       return view('sales.quotes.invoices',compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $q_no = $request->id;
        $quoteData = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->join('customers','quotes.customer_id', '=','customers.id')
                ->select('quotes.*','quote_items.*','customers.business_name')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();
        return response()->json(['status' => 200, 'data' => $quoteData]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, quote $quote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quote $quote)
    {
        //
    }
}
