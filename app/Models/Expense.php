<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'expense_type_id',
        'source',
        'is_paid',
    ];

    ## Start Relationships
    /**
     * Get the service that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the expense_type that owns the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class);
    }
    ## End Relationships

    ## Start Accessors
    public function getIsPaidInTextAttribute()
    {
        if ($this->is_paid) {
            return 'نعم';
        }
        return 'لا';
    }
    ## End Accessors
}
