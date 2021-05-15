<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'is_paid',
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
    public function getIsPaidInTextAttribute()
    {
        if ($this->is_paid) {
            return 'نعم';
        }
        return 'لا';
    }
    ## End Accessors
}
