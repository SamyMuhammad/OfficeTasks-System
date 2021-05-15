<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReceiptService extends Pivot
{
    protected $fillable = [
        'receipt_id',
        'service_id',
        'description',
        'price',
    ];
}
