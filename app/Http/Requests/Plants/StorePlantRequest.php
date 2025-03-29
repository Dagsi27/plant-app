<?php

namespace App\Http\Requests\Plants;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="StorePlantRequest",
 *     type="object",
 *     required={"species_id", "name"},
 *
 *     @OA\Property(property="species_id", type="string", description="ID of the species"),
 *     @OA\Property(property="name", type="string", maxLength=255, description="Name of the plant"),
 *     @OA\Property(property="purchase_date", type="string", format="date", description="Purchase date of the plant"),
 *     @OA\Property(property="notes", type="string", description="Notes about the plant"),
 *     @OA\Property(property="image", type="string", maxLength=255, description="Image URL of the plant")
 * )
 */
class StorePlantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'species_id' => 'required|exists:species,id',
            'name' => 'required|string|max:255',
            'purchase_date' => 'nullable|date',
            'notes' => 'nullable|string',
            // 'image' => 'nullable|string|max:255',
        ];
    }
}
