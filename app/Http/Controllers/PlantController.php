<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plants\StorePlantRequest;
use App\Http\Requests\Plants\UpdatePlantRequest;
use App\Http\Resources\Plants\PlantCollection;
use App\Http\Resources\Plants\PlantResource;
use App\Models\Plant;

class PlantController extends Controller
{
    /**
     * @OA\Get(
     *     path="/plants",
     *     summary="Get list of plants",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/PlantCollection")
     *     )
     * )
     */
    public function index()
    {
        $plants = Plant::all();

        return new PlantCollection($plants);
    }

    /**
     * @OA\Post(
     *     path="/plants",
     *     summary="Create a new plant",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/StorePlantRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Plant created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/PlantResource")
     *     )
     * )
     */
    public function store(StorePlantRequest $request)
    {
        $plant = Plant::create($request->all());

        return (new PlantResource($plant))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * @OA\Get(
     *     path="/plants/{id}",
     *     summary="Get a plant by ID",
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
     *         @OA\JsonContent(ref="#/components/schemas/PlantResource")
     *     )
     * )
     */
    public function show(string $id)
    {
        $plant = Plant::findOrFail($id);

        return new PlantResource($plant);
    }

    /**
     * @OA\Put(
     *     path="/plants/{id}",
     *     summary="Update a plant",
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
     *         @OA\JsonContent(ref="#/components/schemas/UpdatePlantRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Plant updated successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/PlantResource")
     *     )
     * )
     */
    public function update(UpdatePlantRequest $request, string $id)
    {
        $plant = Plant::findOrFail($id);
        $plant->update($request->all());

        return new PlantResource($plant);
    }

    /**
     * @OA\Delete(
     *     path="/plants/{id}",
     *     summary="Delete a plant",
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
     *         description="Plant deleted successfully",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="success", type="string", example="Plant deleted successfully.")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        return response()->json(['success' => 'Plant deleted successfully.']);
    }
}
