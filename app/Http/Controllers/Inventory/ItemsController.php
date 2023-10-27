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
        return view('inventory.items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function generateBarcode()
    {
        $barcode = new DNS1D();
        // $barcode->setStorPath('public/barcodes');
        $barcode->storeAs('public/barcodes'); // Set the storage path for barcode images

        $barcode->getBarcodePNG('123456789', 'C128'); // Generate a Code 128 barcode for the value '123456789'
        // You can change the barcode type ('C128' in this example) and value as needed

        // Return the generated barcode image or display it as needed
        return view('inventory.items.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Item $item)
    {
        if($item->product_name != $request->product_name){

            $rules = [
                'unit' => 'required',
                'product_name' => 'required',
                'product_img' => 'image|mimes:jpeg,png,jpg|max:2048',
                'brand' => 'required',
                'catagory' => 'required',
                'model' => 'required',
                'product_cost' => 'required',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);
            // dd($validator);

            // Check if validation fails.
            if (!$validator->passes()) {
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

                $item = new Item;
                $item->status = $request->status;
                $item->unit = $request->unit;
                $item->product_name = $request->product_name;
                $item->product_image = $imageName;
                $item->barcode_id = $request->barcode;
                $item->brand_id = $request->brand;
                $item->catagory_id = $request->catagory;
                $item->model_id = $request->model;
                $item->product_cost = $request->product_cost;
                $item->product_vat = $request->vat;
                $item->product_charge = $request->o_charge;
                $item->product_mrp = $request->mrp;
                $item->save(); // Save the Item data.

                //Barcode save

                // $barcode_img = new DNS1D();
                // $barcode_img->storeAs('public/barcodes'); // Set the storage path for barcode images
                // $barcode_data = $request->barcode;
                // $barcode_img->getBarcodeSVG($barcode_data, 'EAN13'); // Generate a Code 128 barcode for the value '123456789'

                // $barcode = new Product_barcode;
                // $barcode->barcode = $request->barcode;
                // $barcode->save(); // Save the barcode data.

                // $brand = new Brand;
                // $brand->brand = $request->brand;
                // $brand->save(); // Save the brand data.

                // $catagory = new Catagory;
                // $catagory->catagory = $request->catagory;
                // $catagory->save(); //save catagory data

                // $model = new Product_Model;
                // $model->model = $request->model;
                // $model->save(); //save model data

                // Return a success response.
                return response()->json(['status' => 200, 'message' => 'New Item Added Successfully!']);

            }
        }else{
            return response()->json(['status' => 0, 'message' => "Product Existed!"]);

        }
    }

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
