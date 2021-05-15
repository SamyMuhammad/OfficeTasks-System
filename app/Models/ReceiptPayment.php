<?php

namespace App\Models;

use App\Events\ReceiptPaymentAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptPayment extends Model
{
    use HasFactory;

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => ReceiptPaymentAction::class,
        'updated' => ReceiptPaymentAction::class,
        'deleted' => ReceiptPaymentAction::class,
    ];

    protected $fillable = [
        'receipt_id',
        'amount'
    ];

    /**
     * Get the receipt that owns the ReceiptPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
}
