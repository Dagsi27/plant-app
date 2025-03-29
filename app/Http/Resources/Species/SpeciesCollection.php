<?php

namespace App\Http\Resources\Species;

use App\Http\Resources\DefaultCollection;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="SpeciesCollection",
 *     type="array",
 *
 *     @OA\Items(ref="#/components/schemas/SpeciesResource")
 * )
 */
class SpeciesCollection extends DefaultCollection
{
    public function toArray(Request $request): array
    {
        return $this->defaultFormat(SpeciesResource::collection($this->collection));
    }
}
