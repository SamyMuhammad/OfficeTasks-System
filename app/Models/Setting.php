<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['value'];
    protected $guarded = ['slug', 'name'];

    /**
     * Store new logo after deleting the old one and return image name.
     * 
     * @return string
     */
    public function storeNewLogo($file)
    {
        if (! empty($this->value)) {
            Storage::disk('uploads')->delete('/logo/' . $this->value);
        }
        $value = storeFile($file, 'logo');
        $this->update(['value' => $value]);
    }

    public function getRenderedValueAttribute()
    {
        if ($this->slug === 'logo') {
            if (empty($this->value)){
                return '<img class="table-photo" src="'.asset(config('appGlobals.logo_path')).'" alt="Logo">';
            }
            return '<img class="table-photo" src="'.asset('uploads/logo/'.$this->value).'" alt="Logo">';
        }       
        return $this->value;
    }
}
