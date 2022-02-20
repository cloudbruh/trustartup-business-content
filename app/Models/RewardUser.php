<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="RewardUser",
 *     description="RewardUser model",
 *     @OA\Xml(
 *         name="RewardUser"
 *     )
 * )
 */
class RewardUser extends Model
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     example=1
     * )
     * @var integer
     */

    private $id;

    /**
     * @OA\Property(
     *     title="reward_id",
     *     description="reward_id",
     *     example=1
     * )
     * @var integer
     */

    private $reward_id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="user_id",
     *     example=1
     * )
     * @var integer
     */

    private $user_id;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status (CREATED or SENT or RECIEVED)",
     *     example="CREATED"
     * )
     * @var string
     */

    private $status;

    /**
     * @OA\Property(
     *     title="destination",
     *     description="destination",
     *     example="Wall Street/8/16"
     * )
     * @var string
     */

    private $destination;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="created_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="updated_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $updated_at;

    protected $fillable = [
        'reward_id', 'user_id', 'status', 'destination'
    ];
}
