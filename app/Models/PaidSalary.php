<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'deduction_amount',
        'deduction_reason',
    ];

    ## Start Relationships
    /**
     * Get the user that owns the PaidSalary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    ## End Relationships

    ## Start Accessors
    public function getRemainingAfterDeductionAttribute()
    {
        return $this->user->salary - $this->deduction_amount;
    }
    ## End Accessors
}
