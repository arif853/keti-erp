<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [ 'business_name',
                            'owner_name',
                            'phone',
                            'email',
                            'del_address',
                            ];
}
