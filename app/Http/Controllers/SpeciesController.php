<?php

namespace App\Http\Controllers;

use App\Http\Requests\Species\StoreSpeciesRequest;
use App\Http\Requests\Species\UpdateSpeciesRequest;
use App\Http\Resources\Species\SpeciesCollection;
use App\Http\Resources\Species\SpeciesResource;
use App\Models\Species;

class SpeciesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/species",
     *     summary="Get list of species",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/SpeciesCollection")
     *     )
     * )
     */
    public function index()
    {
        $species = Species::all();

        return new SpeciesCollection($species);
    }

    /**
     * @OA\Post(
     *     path="/species",
     *     summary="Create a new species",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/StoreSpeciesRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Species created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/SpeciesResource")
     *     )
     * )
     */
    public function store(StoreSpeciesRequest $request)
    {
        $species = Species::create($request->all());

        return (new SpeciesResource($species))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * @OA\Get(
     *     path="/species/{id}",
     *     summary="Get a species by ID",
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/SpeciesResource")
     *     )
     * )
     */
    public function show(string $id)
    {
        $species = Species::findOrFail($id);

        return new SpeciesResource($species);
    }

    /**
     * @OA\Put(
     *     path="/species/{id}",
     *     summary="Update a species",
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/UpdateSpeciesRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Species updated successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/SpeciesResource")
     *     )
     * )
     */
    public function update(UpdateSpeciesRequest $request, string $id)
    {
        $species = Species::findOrFail($id);
        $species->update($request->all());

        return new SpeciesResource($species);
    }

    /**
     * @OA\Delete(
     *     path="/species/{id}",
     *     summary="Delete a species",
     *
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *
     *         @OA\Schema(type="string")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Species deleted successfully",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="success", type="string", example="Species deleted successfully.")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $species = Species::findOrFail($id);
        $species->delete();

        return response()->json(['success' => 'Species deleted successfully.']);
    }
}
