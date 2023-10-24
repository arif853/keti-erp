<?php

namespace App\Http\Controllers\Sales\Quotes;

use Log;
use App\Models\items;
use App\Models\Quote;
use App\Models\Customer;
use Milon\Barcode\DNS1D;
use App\Models\QuoteItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

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

            $rules = [
                'date' => 'required',
                'customer' => 'required',
                'quote_no' => 'required',
                'quote' => 'required|array', // Ensure 'quote' is an array
            ];

            // Define custom validation rules for the dynamic quote items
            $items = $request->input('quote', []); // Get the 'quote' array from the request
            // dd($items);
            foreach ($items as $key => $item) {
                $rules["quote.$key.item"] = 'required|string';
                $rules["quote.$key.quantity"] = 'required|numeric';
                $rules["quote.$key.price"] = 'required|numeric';
            }

            // Validate the request
            $validator = Validator::make($request->all(), $rules);
            // dd($validator);

            // Check if validation fails.
            if (!$validator->passes()) {
                return response()->json(['status' => 2, 'error' => $validator->errors()->toArray()]);
            }

            // If validation passes, proceed to insert data into the database.
            // (The database insertion code remains the same as the previous example.)
            else{

                $quote = new Quote;
                $quote->quote_date = $request->date;
                $quote->reference = $request->reference;
                $quote->quotation_no = $request->quote_no;
                $quote->customer_id = $request->customer;
                $quote->total = $request->FTotal;
                $quote->save(); // Save the main quote data.

                // Iterate through the quote items and insert them into the database.
                foreach ($request->quote as $item) {
                    $quoteItem = new QuoteItem;
                    $quoteItem->quotation = $request->quote_no;
                    $quoteItem->items = $item['item'];
                    $quoteItem->description = $item['description'];
                    $quoteItem->quantity = $item['quantity'];
                    $quoteItem->price = $item['price'];
                    $quoteItem->save();
                }

                // Return a success response.
                return response()->json(['status' => 200, 'message' => 'New Quote Added Successfully!']);

                // $quote = new Quote;
                // $quote->quote_date= $request->date;
                // $quote->reference = $request->reference;
                // $quote->quotation_no= $request->quote_no;
                // $quote->customer_id= $request->customer;
                // $quote->total= $request->FTotal;
                // $quote->save();

                // $values = [
                //    'quote_date'=> $request->date,
                //     'reference' => $request->reference,
                //     'quotation_no'=> $request->quote_no,
                //     'customer_id'=> $request->customer,
                //     'total'=> $request->FTotal,
                // ];

                // $quotedata = [];
                // for($x = 0; $x <count($request->quote); $x++){
                //     $quotedata[] = [
                //         'quotation' => $request->quote_no,
                //         'items' => $request->quote[$x]['item'],
                //         'description' => $request->quote[$x]['description'],
                //         'quantity' => $request->quote[$x]['quantity'],
                //         'price' => $request->quote[$x]['price'],
                //     ];
                // }

                // $quoteitem_query = QuoteItem::insert($quotedata);
                // $quote_query =  Quote::insert($values);

                // if($quote_query && $quoteitem_query){

                //     return response()->json(['status' => 200, 'message' => "New Quote Added Successfully!"]);
                // }
                // else{
                //     return response()->json(['status' => 0]);
                //}
            }
        }else{
            return response()->json(['status' => 0, 'message' => "Quote Existed!"]);

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

       return view('sales.quotes.quote',compact('quotation'));
    }

    /**
     * Display the specified resource.
     */
    public function view_pdf(Request $request)
    {
        $q_no = $request->quotation_no;
        $quotation = Quote::join('quote_items', 'quotes.quotation_no', '=', 'quote_items.quotation')
                ->join('customers','quotes.customer_id', '=','customers.id')
                ->select('quotes.*','quote_items.*','customers.business_name','customers.del_address','customers.phone','customers.phone2','customers.email')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();
        $quote_data['qdata'] = $quotation;
        $pdf = Pdf::loadView('sales.quotes.quote_pdf', $quote_data);
        return $pdf->download('quotation_'.$q_no.'.pdf');
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
                ->select('quotes.*','quote_items.*','customers.id as id','customers.business_name')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();
                // log::info($quoteData);
                $cid = Quote::select('Customer_id')->where('quotation_no','=',$q_no)->get();
        return response()->json(['status' => 200,
        'data' => $quoteData]);
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
