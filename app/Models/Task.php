<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'task_status_id',
        'activation_date',
        'closing_date',
        'status_changing_date'
    ];

    public function scopePostponed($query)
    {
        return $query->where('task_status_id', 1);
    }
    
    ## Start Accessors
    /**
     * Get the time taken by the user to do the task.
     * The difference between closing_date and activation_date.
     */
    public function getTaskTimeAttribute()
    {
        if (is_null($this->activation_date) || is_null($this->closing_date)) {
            return null;
        }else {
            $activation = Carbon::create($this->activation_date);
            $closing = Carbon::create($this->closing_date);
            return $closing->diffInDays($activation);
        }
    }

    public function getAssigningTimeAttribute()
    {
        if ($this->hasUsers()) {
            return $this->users->last()->created_at->format('Y-m-d');
        }
        return null;
    }

    public function getCategoryAttribute()
    {
        return $this->receipt->category->name;
    }
    ## End Accessors

    ## Start Relationships
    /**
     * Get the receipt that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    /**
     * Get the task_status that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task_status()
    {
        return $this->belongsTo(TaskStatus::class);
    }

    /**
     * The users that belong to the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    ## End Relationships

    public function hasUsers()
    {
        return $this->users->count() != 0;
    }

    public function updateActivationDate()
    {
        $this->update(['activation_date' => date('Y-m-d')]);
    }
}
