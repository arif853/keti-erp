<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Catagory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'unit',
        'product_name',
        'product_image',
        'barcode_id',
        'brand_id',
        'catagory_id',
        'model_id',
        'product_cost',
        'product_vat',
        'product_charge',
        'product_mrp',
    ];

    /**
     * Get the user associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function barcode(): HasOne
    {
        return $this->hasOne(Product_barcode::class);
    }

    /**
     * Get the user associated with the Item
     *
     * @return \Illu
     * minate\Database\Eloquent\Relations\HasOne
     */
    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }
    /**
     * Get the user associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function catagory(): HasOne
    {
        return $this->hasOne(Catagory::class);
    }

    /**
     * Get the user associated with the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_model(): HasOne
    {
        return $this->hasOne(Product_model::class);
    }
}
