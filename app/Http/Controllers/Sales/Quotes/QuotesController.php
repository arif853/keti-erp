<?php

namespace App\Http\Controllers\Sales\Quotes;

use Log;
use App\Models\items;
use App\Models\Quote;
use App\Models\Customer;
use App\Models\QuoteItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        $quoteCount = Quote::all();
        return view('sales.quotes.index',compact('customer','quoteCount'));
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
    public function store(Request $request, Quote $quote)
    {
        if($quote->quotation_no != $request->quote_no){

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

        }else{
            return response()->json(['status' => 400, 'message' => "Quote Existed!"]);
        }

    }

    public function datatable()
    {
        $quoteData = Quote::join('customers','quotes.customer_id', '=','customers.id')
        ->select('customers.business_name as business_name','quotes.quotation_no','quotes.quote_date','quotes.customer_id')
        ->get();
        return response()->json(['status' => 200, 'data' => $quoteData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $q_no = $request->quotation_no;
        $quotation = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->join('customers','quotes.customer_id', '=','customers.id')
                ->select('quotes.*','quote_items.*','customers.business_name','customers.del_address','customers.phone','customers.phone2','customers.email')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();

       return view('sales.quotes.invoices',compact('quotation'));
    }

    // public function view(){

    //     return view('sales.quotes.invoice');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $q_no = $request->id;
        $quoteData = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->join('customers','quotes.customer_id', '=','customers.id')
                ->select('quotes.*','quote_items.*','customers.id','customers.business_name')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();
                // log::info($quoteData);
        return response()->json(['status' => 200,
        'data' => $quoteData
    ]);
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
    public function destroy(Request $request, QuoteItem $quoteitem)
    {
        $quoteId = $request->id;

        if($quoteitem->quotation == $quoteId){
            $quotation = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->where('quote_items.quotation', '=', $quoteId)
                ->delete();
        }
        else{
            $quotation = Quote::where('quotation_no', '=', $quoteId)
            ->delete();
        }

    }
}
