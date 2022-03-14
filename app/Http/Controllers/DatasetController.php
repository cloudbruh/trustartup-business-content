<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Dataset"},
     *   path="/dataset",
     *   summary="Datasets",
     *   @OA\Parameter(
     *      name="moderatable_id",
     *      in="query",
     *      description="Moderatable id",
     *   ),
     *   @OA\Parameter(
     *      name="moderatable_type",
     *      in="query",
     *      description="Moderatable type",
     *   ),
     *   @OA\Parameter(
     *      name="status",
     *      in="query",
     *      description="Status",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/Dataset"),
     *         )
     *      )
     *   ),
     * )
     */
    public function show(Request $request)
    {
        $query = Dataset::query();
        if ($request->moderatable_id)
            $query = $query->where('moderatable_id', $request->moderatable_id);
        if ($request->moderatable_type)
            $query = $query->where('moderatable_type', $request->moderatable_type);
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->status)
            $query = $query->where('status', $request->status);
        return response()->json($query->get());
    }

    /**
     * @OA\Put(
     *   tags={"Dataset"},
     *   path="/dataset",
     *   summary="Dataset update",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function update(Request $request)
    {
        $dataset = Dataset::findOrFail($request->id);
        $dataset->update($request->all());
        return response()->json($dataset, 200);
    }

    /**
     * @OA\Get(
     *      path="/dataset/{id}",
     *      tags={"Dataset"},
     *      summary="Get dataset by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Dataset id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Dataset"),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function get($id)
    {
        return response()->json(Dataset::findOrFail($id));
    }

    /**
     * @OA\Post(
     *   tags={"Dataset"},
     *   path="/dataset",
     *   summary="Create dataset",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function create(Request $request)
    {
        $dataset = Dataset::create([
            'moderatable_type' => $request->moderatable_type,
            'content' => $request->content,
            'moderatable_id' => $request->moderatable_id,
            'user_id' => $request->user_id,
        ]);
        return response()->json($dataset, 201);
    }

    /**
     * @OA\Delete(
     *   tags={"Dataset"},
     *   path="/dataset/{id}",
     *   summary="Delete dataset",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Dataset id",
     *      required=true,
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function delete($id)
    {
        Dataset::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Deleted Successfully',
        ], 200);
    }
}
