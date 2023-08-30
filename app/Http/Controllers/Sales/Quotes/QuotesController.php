<?php

namespace App\Http\Controllers\Sales\Quotes;

use App\Models\Quote;
use App\Models\Customer;
use App\Models\QuoteItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Log;

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
            $quotes = new Quote;
            $quotes->quotation_no= $request->quote_no;
            $quotes->reference = $request->reference;
            $quotes->customer_id= $request->customer;
            $quotes->quote_date= $request->date;
            $quotes->total= $request->total;
            $quotes->save();

            $quotedata = [];
            for($x = 0; $x <count($request->quote); $x++){
                $quotedata[] = [
                    'quotation' => $request->quote_no,
                    'items' => $request->quote[$x]['item'],
                    'description' => $request->quote[$x]['description'],
                    'quantity' => $request->quote[$x]['quantity'],
                    'price' => $request->quote[$x]['price'],
                ];
            }
            QuoteItem::insert($quotedata);


        return response()->json(['status' => 200, 'message' => "New Quote Added Successfully!"]);
    }

    public function datatable()
    {
        // $quoteData = Quote::select('quotation_no','quote_date','customer_id')->get();
        $quoteData = Quote::join('customers','quotes.customer_id', '=','customers.id')
        ->select('customers.business_name as business_name','quotes.quotation_no','quotes.quote_date','quotes.customer_id')
        ->get();
        // log::info($quoteData);

        return response()->json(['status' => 200, 'data' => $quoteData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(quote $quote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(quote $quote)
    {
        //
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
