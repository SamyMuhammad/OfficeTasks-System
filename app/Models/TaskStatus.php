<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    const UNEDITABLE_RECORDS_IDS = [1, 2, 3];

    public function isEditable()
    {
        if (in_array($this->id, static::UNEDITABLE_RECORDS_IDS)) {
            return false;
        }
        return true;
    }
}
