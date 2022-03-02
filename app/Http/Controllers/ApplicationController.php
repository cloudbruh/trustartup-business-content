<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Application"},
     *   path="/application",
     *   summary="Applications by user id and startup id",
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
        $query = Application::query();
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->startup_id)
            $query = $query->where('startup_id', $request->startup_id);
        if ($request->status)
            $query = $query->where('status', $request->status);
        return response()->json($query->get());
    }

    /**
     * @OA\Put(
     *   tags={"Application"},
     *   path="/application",
     *   summary="Application update",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Application")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Application")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function update(Request $request)
    {
        $application = Application::findOrFail($request->id);
        $application->update($request->all());
        return response()->json($application, 200);
    }

    /**
     * @OA\Get(
     *   tags={"Application"},
     *   path="/application/{id}",
     *   summary="Application get by ID",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Application id",
     *      required=true,
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Application")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function get($id)
    {
        return response()->json(Application::findOrFail($id));
    }

    /**
     * @OA\Post(
     *   tags={"Application"},
     *   path="/application",
     *   summary="Create application",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Application")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Application")
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function create(Request $request)
    {
        $application = Application::create([
            'user_id' => $request->user_id,
            'startup_id' => $request->startup_id,
            'message' => $request->message,
            'status' => $request->status ? $request->status : 'CREATED',
        ]);
        return response()->json($application, 201);
    }

    /**
     * @OA\Delete(
     *   tags={"Application"},
     *   path="/application/{id}",
     *   summary="Delete application",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Application id",
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
        Application::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Deleted Successfully',
        ], 200);
    }
}
