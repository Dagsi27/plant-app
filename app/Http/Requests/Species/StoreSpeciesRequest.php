<?php

namespace App\Http\Requests\Species;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StoreSpeciesRequest",
 *     type="object",
 *     required={"name", "watering_frequency", "light_requirements", "soil_type"},
 *
 *     @OA\Property(property="name", type="string", maxLength=255, description="Name of the species"),
 *     @OA\Property(property="watering_frequency", type=integer, description="Watering frequency of the species"),
 *     @OA\Property(property="light_requirements", type="string", description="Light requirements of the species"),
 *     @OA\Property(property="soil_type", type="string", description="Soil type for the species"),
 *     @OA\Property(property="notes", type="string", description="Additional notes about the species")
 * )
 */
class StoreSpeciesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'watering_frequency' => 'required|integer',
            'light_requirements' => 'required|string',
            'soil_type' => 'required|string',
            'notes' => 'nullable|string',
        ];
    }
}
