<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewardUser;

class RewardUserController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"RewardUser"},
     *   path="/reward_user",
     *   summary="RewardUser by user id and reward id",
     *   @OA\Parameter(
     *      name="reward_id",
     *      in="query",
     *      description="Reward id",
     *   ),
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      description="User id",
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/RewardUser"),
     *         )
     *      )
     *   ),
     * )
     */
    public function show(Request $request)
    {
        $query = RewardUser::query();
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->reward_id)
            $query = $query->where('reward_id', $request->reward_id);
        return response()->json($query->get());
    }

    /**
     * @OA\Put(
     *   tags={"RewardUser"},
     *   path="/reward_user",
     *   summary="RewardUser update",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RewardUser")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/RewardUser")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function update(Request $request)
    {
        $reward_user = RewardUser::findOrFail($request->id);
        $reward_user->update($request->all());
        return response()->json($reward_user, 200);
    }

    /**
     * @OA\Post(
     *   tags={"RewardUser"},
     *   path="/reward_user",
     *   summary="Create RewardUser",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/RewardUser")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/RewardUser")
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function create(Request $request)
    {
        $reward_user = RewardUser::create([
            'reward_id' => $request->reward_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'destination' => $request->destination,
        ]);
        return response()->json($reward_user, 201);
    }
}
