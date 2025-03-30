<?php

namespace App\Http\Requests\WateringHistories;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="UpdateWateringHistoryRequest",
 *     type="object",
 *
 *     @OA\Property(property="plant_id", type="integer", description="ID of the plant"),
 *     @OA\Property(property="watering_date", type="string", format="date-time", description="Date and time of watering"),
 *     @OA\Property(property="notes", type="string", description="Notes about the watering")
 * )
 */
class UpdateWateringHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'plant_id' => 'sometimes|exists:plants,id',
            'watering_date' => 'sometimes|date',
            'notes' => 'nullable|string',
        ];
    }
}
