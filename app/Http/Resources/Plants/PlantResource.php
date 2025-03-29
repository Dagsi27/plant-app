<?php

namespace App\Http\Resources\Plants;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="PlantResource",
 *     type="object",
 *
 *     @OA\Property(property="id", type="string"),
 *     @OA\Property(property="species_id", type="string"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="purchase_date", type="string", format="date"),
 *     @OA\Property(property="notes", type="string"),
 *     @OA\Property(property="image", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class PlantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'species_id' => $this->species_id,
            'name' => $this->name,
            'purchase_date' => $this->purchase_date,
            'notes' => $this->notes,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
