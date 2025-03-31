<?php

namespace App\Http\Requests\Species;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="UpdateSpeciesRequest",
 *     type="object",
 *
 *     @OA\Property(property="name", type="string", maxLength=255, description="Name of the species"),
 *     @OA\Property(property="watering_frequency", type="integer", description="Watering frequency of the species"),
 *     @OA\Property(property="light_requirements", type="string", description="Light requirements of the species"),
 *     @OA\Property(property="soil_type", type="string", description="Soil type for the species"),
 *     @OA\Property(property="notes", type="string", description="Additional notes about the species")
 * )
 */
class UpdateSpeciesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'watering_frequency' => 'sometimes|integer',
            'light_requirements' => 'sometimes|string',
            'soil_type' => 'sometimes|string',
            'notes' => 'nullable|string',
        ];
    }
}
