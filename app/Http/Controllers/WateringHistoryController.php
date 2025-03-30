<?php

namespace App\Http\Controllers;

use App\Http\Requests\WateringHistories\StoreWateringHistoryRequest;
use App\Http\Requests\WateringHistories\UpdateWateringHistoryRequest;
use App\Http\Resources\WateringHistories\WateringHistoryCollection;
use App\Http\Resources\WateringHistories\WateringHistoryResource;
use App\Models\WateringHistory;

class WateringHistoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/watering-history",
     *     summary="Get list of watering history",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *
     *         @OA\JsonContent(ref="#/components/schemas/WateringHistoryCollection")
     *     )
     * )
     */
    public function index()
    {
        $wateringHistory = WateringHistory::all();

        return new WateringHistoryCollection($wateringHistory);
    }

    /**
     * @OA\Post(
     *     path="/watering-history",
     *     summary="Create a new watering history record",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(ref="#/components/schemas/StoreWateringHistoryRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Watering history record created successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/WateringHistoryResource")
     *     )
     * )
     */
    public function store(StoreWateringHistoryRequest $request)
    {
        $wateringHistory = WateringHistory::create($request->all());

        return (new WateringHistoryResource($wateringHistory))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * @OA\Get(
     *     path="/watering-history/{id}",
     *     summary="Get a watering history record by ID",
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
     *         @OA\JsonContent(ref="#/components/schemas/WateringHistoryResource")
     *     )
     * )
     */
    public function show(string $id)
    {
        $wateringHistory = WateringHistory::findOrFail($id);

        return new WateringHistoryResource($wateringHistory);
    }

    /**
     * @OA\Put(
     *     path="/watering-history/{id}",
     *     summary="Update a watering history record",
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
     *         @OA\JsonContent(ref="#/components/schemas/UpdateWateringHistoryRequest")
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Watering history record updated successfully",
     *
     *         @OA\JsonContent(ref="#/components/schemas/WateringHistoryResource")
     *     )
     * )
     */
    public function update(UpdateWateringHistoryRequest $request, string $id)
    {
        $wateringHistory = WateringHistory::findOrFail($id);
        $wateringHistory->update($request->all());

        return new WateringHistoryResource($wateringHistory);
    }

    /**
     * @OA\Delete(
     *     path="/watering-history/{id}",
     *     summary="Delete a watering history record",
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
     *         description="Watering history record deleted successfully",
     *
     *         @OA\JsonContent(
     *
     *             @OA\Property(property="success", type="string", example="Watering history record deleted successfully.")
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $wateringHistory = WateringHistory::findOrFail($id);
        $wateringHistory->delete();

        return response()->json(['success' => 'Watering history record deleted successfully.']);
    }
}
