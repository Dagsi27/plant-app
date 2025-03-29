<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Species extends Model
{
    protected $fillable = [
        'name',
        'watering_frequency',
        'light_requirements',
        'soil_type',
        'notes',
    ];

    public function plants(): HasMany
    {
        return $this->hasMany(Plant::class);
    }
}
