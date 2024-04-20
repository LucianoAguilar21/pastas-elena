<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'user_id',
        'customer',
        'paid',
        'status',
        'delivery',
        'address',
        'delivery_price',
        'delivery_date',
        'delivery_paid',
        'total'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
