<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class DefaultCollection extends ResourceCollection
{
    public function defaultFormat(ResourceCollection $data): array
    {
        return [
            'data' => $data,
            'count' => $this->collection->count(),
        ];
    }
}
