<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'project',
        'payment_method_id',
        'user_id',
        'category_id',
        // 'paid',
        'status',
        'created_by',
    ];

    /**
     * Get the options for the enum fields.
     */
    public static function getEnumValues(string $field)
    {
        switch ($field) {
            case 'status':
                return ['unpaid', 'paid'];
                break;
            case 'created_by':
                return ['user', 'admin'];
                break;
            default:
                return [];
                break;
        }
    }

    public function isPaid()
    {
        return $this->status === 'paid';
    }

    ## Start Scopes
    public function scopeUserReceipts($query)
    {
        return $query->where('created_by', 'user');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeUnpaid($query)
    {
        return $query->where('status', 'unpaid');
    }
    ## End Scopes

    ## Start Accessors
    public function getCreationDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getTotalAttribute()
    {
        return $this->services()->sum('price');
    }

    public function getPaidAttribute()
    {
        return $this->receipt_payments()->sum('amount');
    }

    public function getRemainingAttribute()
    {
        return $this->total - $this->paid;
    }
    ## End Accessors

    ## Start Relationships
    /**
     * Get the client that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the payment_method that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the user that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The services that belong to the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('description', 'price')->withTimestamps();
    }

    /**
     * Get all of the receipt_payments for the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receipt_payments()
    {
        return $this->hasMany(ReceiptPayment::class);
    }

    /**
     * Get the task associated with the Receipt
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function task()
    {
        return $this->hasOne(Task::class);
    }
    ## End Relationships
}
