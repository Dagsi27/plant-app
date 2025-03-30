<?php

namespace App\Http\Resources\Species;

use App\Http\Resources\Plants\PlantResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="SpeciesResource",
 *     type="object",
 *
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Ficus"),
 *     @OA\Property(property="watering_frequency", type="string", example="Weekly"),
 *     @OA\Property(property="light_requirements", type="string", example="Indirect sunlight"),
 *     @OA\Property(property="soil_type", type="string", example="Well-draining soil"),
 *     @OA\Property(property="notes", type="string", example="Keep the soil moist but not waterlogged."),
 *     @OA\Property(property="plants", type="array", @OA\Items(ref="#/components/schemas/PlantResource"))
 * )
 */
class SpeciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'watering_frequency' => $this->watering_frequency,
            'light_requirements' => $this->light_requirements,
            'soil_type' => $this->soil_type,
            'notes' => $this->notes,
            'plants' => PlantResource::collection($this->whenLoaded('plants')),
        ];
    }
}
