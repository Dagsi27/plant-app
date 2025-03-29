<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WateringHistory extends Model
{
    protected $fillable = [
        'plant_id',
        'watering_date',
        'notes',
    ];

    protected $casts = [
        'watering_date' => 'datetime',
    ];

    public function plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class);
    }
}
