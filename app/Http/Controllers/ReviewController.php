<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Review"},
     *   path="/reviews",
     *   summary="Review show all or by user id or by startup id",
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      description="User id",
     *   ),
     *   @OA\Parameter(
     *      name="startup_id",
     *      in="query",
     *      description="Startup id",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/Review"),
     *         )
     *      )
     *   ),
     * )
     */
    public function show(Request $request)
    {
        $query = Review::query();
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->startup_id)
            $query = $query->where('startup_id', $request->startup_id);
        return response()->json($query->get());
    }

    /**
     * @OA\Put(
     *   tags={"Review"},
     *   path="/review",
     *   summary="Review update",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Review")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Review")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function update(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->update($request->all());
        return response()->json($review, 200);
    }

    /**
     * @OA\Get(
     *      path="/review/{id}",
     *      tags={"Review"},
     *      summary="Get review by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Review id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Review"),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function get($id)
    {
        return response()->json(Review::findOrFail($id));
    }

    /**
     * @OA\Post(
     *   tags={"Review"},
     *   path="/review",
     *   summary="Create review",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Review")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Review")
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function create(Request $request)
    {
        $review = Review::create([
            'user_id' => $request->user_id,
            'startup_id' => $request->startup_id,
            'direction' => $request->direction,
            'message' => $request->message,
            'type' => $request->type,
        ]);
        return response()->json($review, 201);
    }

    /**
     * @OA\Delete(
     *   tags={"Review"},
     *   path="/review/{id}",
     *   summary="Delete review",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Review id",
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
        Review::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Deleted Successfully',
        ], 200);
    }
}
