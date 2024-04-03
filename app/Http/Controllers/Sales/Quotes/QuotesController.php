<?php

namespace App\Http\Controllers\Sales\Quotes;

use Log;
use App\Models\Item;
use App\Models\Quote;
use App\Models\Customer;
use Milon\Barcode\DNS1D;
use App\Models\QuoteItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Validator;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        $quoteCount = Quote::all();
        $items = Item::select('id','product_name','product_mrp')->get();
        return view('sales.quotes.index',compact('customer','quoteCount','items'));
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
    public function store(Request $request, Quote $quotes)
    {


        if($quotes->quotation_no != $request->quote_no){

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

            $customMessages = [
                'date.required' => 'The date field is required!!',
                'customer.required' => 'The customer field is required.',
                'quote_no.required' => 'The quote number field is required.',
                'quote.required' => 'The quote field is required.',
                'quote.array' => 'The quote field must be an array.',
                'quote.*.item.required' => 'The item field is required for all quote items.',
                'quote.*.item.string' => 'The item field must be a string for all quote items.',
                'quote.*.quantity.required' => 'Enter Quantity.',
                'quote.*.quantity.numeric' => 'The Quantity must be number.',
                'quote.*.price.required' => 'The price field is required for all quote items.',
                'quote.*.price.numeric' => 'The price field must be numeric for all quote items.',
            ];

            $validator = Validator::make($request->all(), $rules,$customMessages);
            $errors = $validator->errors()->messages(); // Get the default error messages

            foreach ($customMessages as $field => $message) {
                if (array_key_exists($field, $errors)) {
                    $errors[$field][] = $message;
                }
            }

            // Validate the request
            // dd($validator);

            // Check if validation fails.
            if (!$validator->passes()) {
                return response()->json(['status' => 2, 'error' => $errors]);
            }

            // If validation passes, proceed to insert data into the database.
            // (The database insertion code remains the same as the previous example.)
            else{

                $quotes = new Quote;
                $quotes->quotation_no = $request->quote_no;
                $quotes->reference = $request->reference;
                $quotes->customer_id = $request->customer;
                $quotes->quote_date = $request->date;
                $quotes->total = $request->FTotal;
                $quotes->save(); // Save the main quote data.


                // Iterate through the quote items and insert them into the database.
                foreach ($request->quote as $item) {
                    $quoteItem = new QuoteItem;
                    $quoteItem->quotation = $request->quote_no;
                    $quoteItem->items = $item['item'];
                    $quoteItem->quantity = $item['quantity'];
                    $quoteItem->price = $item['price'];
                    $quoteItem->save();
                }


                // Return a success response.
                return response()->json(['status' => 200, 'message' => 'New Quote Added Successfully!']);

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
                ->join('customers','quotes.customer_id', '=','customers.id')->join('items', 'quote_items.items', '=', 'items.id')
                ->select('quotes.*','quote_items.*','customers.business_name','customers.del_address','customers.phone','customers.phone2','customers.email','items.product_name')
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
                ->join('customers','quotes.customer_id', '=','customers.id')->join('items', 'quote_items.items', '=', 'items.id')
                ->select('quotes.*','quote_items.*','customers.business_name','customers.del_address','customers.phone','customers.phone2','customers.email','items.product_name as product')
                ->where('quote_items.quotation', '=', $q_no)
                ->get();
        // $quoteItem = QuoteItem::join('items','quote_items.items', '=', 'items.id');
        $quote_data['qdata'] = $quotation;
        $pdf = Pdf::loadView('sales.quotes.quote_pdf', $quote_data);
        return $pdf->download('quotation_'.$q_no.'.pdf');
        // return $pdf->stream();
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
