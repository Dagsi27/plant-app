<?php

namespace App\Http\Resources\WateringHistories;

use App\Http\Resources\Plants\PlantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="WateringHistoryResource",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="plant_id", type="integer", example=1),
 *     @OA\Property(property="watering_date", type="string", format="date-time", example="2023-10-01T00:00:00Z"),
 *     @OA\Property(property="notes", type="string", example="Watered thoroughly."),
 *     @OA\Property(property="plant", ref="#/components/schemas/PlantResource")
 * )
 */
class WateringHistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'plant_id' => $this->plant_id,
            'watering_date' => $this->watering_date->toDateTimeString(),
            'notes' => $this->notes,
            'plant' => new PlantResource($this->whenLoaded('plant')),
        ];
    }
}
