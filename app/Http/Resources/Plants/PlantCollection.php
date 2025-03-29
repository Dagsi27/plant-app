<?php

namespace App\Http\Resources\Plants;

use App\Http\Resources\DefaultCollection;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="PlantCollection",
 *     type="array",
 *
 *     @OA\Items(ref="#/components/schemas/PlantResource")
 * )
 */
class PlantCollection extends DefaultCollection
{
    public function toArray(Request $request): array
    {
        return $this->defaultFormat(PlantResource::collection($this->collection));
    }
}
