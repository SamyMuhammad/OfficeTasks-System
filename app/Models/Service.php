<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The receipts that belong to the Service
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function receipts()
    {
        return $this->belongsToMany(Receipt::class)->withPivot('description', 'price')->withTimestamps();
    }
}
