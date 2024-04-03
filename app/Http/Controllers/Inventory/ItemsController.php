<?php

namespace App\Http\Controllers\Inventory;

use DB;
use App\Models\Item;
use App\Models\Brand;
use App\Models\Catagory;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use App\Models\Product_Model;
use App\Models\Product_barcode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve your item data from the database
        $itemData = Item::get();

        // Return the item data and barcode data in the response
        return view('inventory.items.index',compact('itemData'));
    }


    public function generateBarcode(){
        do {
            // Generate a 2-digit random number
            $randomNumber = str_pad(mt_rand(1, 99999999999), 11, '0', STR_PAD_LEFT);

            // Get the current year
            // $currentYear = date('y');
            // $currentMonth = date('m');

            // Concatenate the components to create the final code
            // $invoiceNo= $currentMonth.$currentYear.$randomNumber;

            // Check if the generated code already exists in the database
            $codeExists = \DB::table('items')->where('barcode_id', $randomNumber)->exists();

        } while ($codeExists);

        $barcode = new DNS1D();
        $barcodeType = 'EAN13'; // Set the barcode type, e.g., Code 128
        $barcode->getBarcodePNG($randomNumber, $barcodeType);
        $barcode->setStorPath('public/barcodes');
        return $randomNumber;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barcode = $this->generateBarcode();
        $brands = Brand::all();
        // dd($barcode);
        return view('inventory.items.create',compact('barcode','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if($item->product_name != $request->product_name){

            $validator = Validator::make($request->all(), [
                'unit' => 'required',
                'product_name' => 'required|exists:items,product_name',
                'product_img' => 'image|mimes:jpeg,png,jpg|nullable',
                'brand' => 'required',
                'catagory' => 'required',
                'model' => 'required',
                'product_cost' => 'required',
            ]);

            // Check if validation fails.
            if ($validator->failed()) {
                return redirect()->back('error', $validator->errors()->toArray());
            }

            // If validation passes, proceed to insert data into the database.
            else{

                if($request->hasFile('product_img')){
                    $image = $request->file('product_img');
                    $imageName = $request->product_name.'_'.time().'.'. $image->getClientOriginalExtension();
                    // $image->store('public/product_image/'.$imageName);
                    Storage::disk('public')->put('product_image/'.$imageName, File::get($image)); //save image data
                }
                else {
                    $imageName = null;
                }

                $this->generateBarcode($request->barcode); // Replace 'barcode_id' with the actual field name you want to use

                $item = new Item;
                $item->status = $request->status;
                $item->unit = $request->unit;
                $item->product_name = $request->product_name;
                $item->product_image = $imageName ;
                $item->barcode_id = $request->barcode;
                $item->brand_id = $request->brand;
                $item->catagory_id = $request->catagory;
                $item->product_model_id = $request->model;
                $item->product_cost = $request->product_cost;
                $item->product_vat = $request->vat;
                $item->product_charge = $request->o_charge;
                $item->product_mrp = $request->mrp;
                $item->save(); // Save the Item data.

                // Return a success response.
                // return response()->json(['status' => 200, 'message' => 'New Item Added Successfully!']);
                return redirect()->route('items.index')->with('success','New Item Added Successfully!');
            }
        // }else{
        //     return response()->json(['status' => 0, 'message' => "Product Existed!"]);

        // }
    }


    public function issue_item(Request $request){

    }

    // public function datatable(){

    //     // Retrieve your item data from the database
    //     $itemData = Item::get();

    //     // Initialize an array to store barcode data
    //     $barcodeData = [];

    //     // Loop through your item data and generate a barcode for each item
    //     foreach ($itemData as $item) {
    //         $barcode_data = $this->generateBarcode($item->barcode_id); // Replace 'barcode_id' with the actual field name you want to use
    //         $barcodeData[] = $barcode_data;
    //     }

    //     // Return the item data and barcode data in the response
    //     return view('inventory.items.index',compact('itemData','barcodeData'));
    //     // return response()->json(['status' => 200, 'data' => $itemData, 'barcode' => $barcodeData]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $item = Item::find($request->id);

        // dd($item);
        return view('inventory.items.edit',['item'=>$item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $item = Item::find($request->id);

        $validator = Validator::make($request->all(), [
            'unit' => 'required',
            'product_name' => 'required',
            'product_img' => 'image|mimes:jpeg,png,jpg|nullable',
            'brand' => 'required',
            'catagory' => 'required',
            'model' => 'required',
            'product_cost' => 'required',
        ]);

        // Check if validation fails.
        if ($validator->failed()) {
            return response()->json(['status' => 2, 'error' => $validator->errors()->toArray()]);
        }
        // If validation passes, proceed to insert data into the database.
        else{

            if($request->hasFile('product_img')){
                $image = $request->file('product_img');
                $imageName = $request->product_name.'_'.time().'.'. $image->getClientOriginalExtension();
                // $image->store('public/product_image/'.$imageName);
                Storage::disk('public')->put('product_image/'.$imageName, File::get($image)); //save image data
            }
            else {
                $imageName = $item->product_image ? $item->product_image : null;
            }

            // $this->generateBarcode($request->barcode); // Replace 'barcode_id' with the actual field name you want to use

            // $item = new Item;
            $item->status = $request->status;
            $item->unit = $request->unit;
            $item->product_name = $request->product_name;
            $item->product_image = $imageName ;
            $item->barcode_id = $request->barcode;
            $item->brand_id = $request->brand;
            $item->catagory_id = $request->catagory;
            $item->product_model_id = $request->model;
            $item->product_cost = $request->product_cost;
            $item->product_vat = $request->vat;
            $item->product_charge = $request->o_charge;
            $item->product_mrp = $request->mrp;
            $item->save(); // Save the Item data.

            // Return a success response.
            // Session::flash('success','New Item Updated Successfully!');
            return redirect()->route('items.index')->with('success','New Item Updated Successfully!');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = Item::find($request->id);
        $item->delete();
        Storage::delete('product_image/'.$item->product_images);
        return redirect()->back()->with('success','Item Deleted Successfully!!!');
    }
}
