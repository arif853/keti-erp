<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [ 'date','reference','quote_no','customer','item','description','price','total',];

    /**
     * Get all of the items for the quote
     *
     * @return HasMany
     */
    public function QuoteItem(): HasMany
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
