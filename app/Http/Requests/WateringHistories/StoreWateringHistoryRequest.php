<?php

namespace App\Http\Requests\WateringHistories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StoreWateringHistoryRequest",
 *     type="object",
 *     required={"plant_id", "watering_date"},
 *
 *     @OA\Property(property="plant_id", type="integer", description="ID of the plant"),
 *     @OA\Property(property="watering_date", type="string", format="date-time", description="Date and time of watering"),
 *     @OA\Property(property="notes", type="string", description="Notes about the watering")
 * )
 */
class StoreWateringHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'plant_id' => 'required|exists:plants,id',
            'watering_date' => 'required|date',
            'notes' => 'nullable|string',
        ];
    }
}
