<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plant extends Model
{
    protected $fillable = [
        'species_id',
        'name',
        'purchase_date',
        'notes',
        'image',
    ];

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function wateringHistories(): HasMany
    {
        return $this->hasMany(WateringHistory::class);
    }
}
