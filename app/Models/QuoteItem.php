<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the quotation_item
     *
     * @return BelongsTo
     */
    public function Quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }
}
