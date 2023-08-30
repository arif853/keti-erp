<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [ 'business_name','owner_name','phone','email','del_address',];

    /**
     * Get the quote associated with the Customer
     *
     * @return HasOne
     */
    public function quote(): HasOne
    {
        return $this->hasOne(Quote::class, 'customer_id');
    }
}
