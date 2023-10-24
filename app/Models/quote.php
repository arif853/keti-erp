<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [ 'quote_date',
                            'quotation_no',
                            'customer_id',
                            'item',
                            'quantity',
                            'price',
                            'total'
                        ];

    /**
     * Get all of the items for the quote
     *
     * @return HasMany
     */
    public function quoteitem()
    {
        return $this->hasMany(QuoteItem::class);
    }

    /**
     * Get the customer that owns the quote
     *
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
