<?php

namespace App\Http\Controllers\Inventory;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Catagory;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use App\Models\Product_Model;
use App\Models\Product_barcode;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
    public function store(Request $request, Item $item)
    {
        if($item->product_name != $request->product_name){

            $validator = Validator::make($request->all(), [
                'unit' => 'required',
                'product_name' => 'required',
                'product_img' => 'image|mimes:jpeg,png,jpg',
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

                $this->generateBarcode($request->barcode); // Replace 'barcode_id' with the actual field name you want to use

                $item = new Item;
                $item->status = $request->status;
                $item->unit = $request->unit;
                $item->product_name = $request->product_name;
                $item->product_image = $imageName;
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
                return response()->json(['status' => 200, 'message' => 'New Item Added Successfully!']);

            }
        }else{
            return response()->json(['status' => 0, 'message' => "Product Existed!"]);

        }
    }

    public function generateBarcode($value){

        $barcode = new DNS1D();
        $barcodeType = 'EAN13'; // Set the barcode type, e.g., Code 128
        $barcode->getBarcodePNG($value, $barcodeType);
        $barcode->setStorPath('public/barcodes');

        // return $barcode_img;
        // The generated barcode image will be automatically saved in the 'public/barcodes' directory as a PNG file.
        // You can return the path to the saved barcode image or display it as needed.
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
