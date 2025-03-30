<?php

namespace App\Http\Resources\WateringHistories;

use App\Http\Resources\DefaultCollection;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="WateringHistoryCollection",
 *     type="array",
 *
 *     @OA\Items(ref="#/components/schemas/WateringHistoryResource")
 * )
 */
class WateringHistoryCollection extends DefaultCollection
{
    public function toArray(Request $request): array
    {
        return $this->defaultFormat(WateringHistoryResource::collection($this->collection));
    }
}
