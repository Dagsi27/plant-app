<?php

namespace App\Http\Requests\Plants;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="UpdatePlantRequest",
 *     type="object",
 *
 *     @OA\Property(property="species_id", type="string", description="ID of the species"),
 *     @OA\Property(property="name", type="string", maxLength=255, description="Name of the plant"),
 *     @OA\Property(property="purchase_date", type="string", format="date", description="Purchase date of the plant"),
 *     @OA\Property(property="notes", type="string", description="Notes about the plant"),
 *     @OA\Property(property="image", type="string", maxLength=255, description="Image URL of the plant")
 * )
 */
class UpdatePlantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255',
            'purchase_date' => 'date',
            'watering_frequency' => 'required|integer',
            'light_requirements' => 'required|string',
            'soil_type' => 'required|string',
            'notes' => 'string',
            // 'image' => 'string|max:255',
        ];
    }
}
