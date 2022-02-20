<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Review",
 *     description="Review model",
 *     @OA\Xml(
 *         name="Review"
 *     )
 * )
 */
class Review extends Model
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
     *     title="startup_id",
     *     description="startup_id",
     *     example=1
     * )
     * @var integer
     */

    private $startup_id;

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
     *     title="direction",
     *     description="direction (UTOS or STOU)",
     *     example="UTOS"
     * )
     * @var string
     */

    private $direction;

    /**
     * @OA\Property(
     *     title="message",
     *     description="message",
     *     example="Good work!"
     * )
     * @var string
     */

    private $message;

    /**
     * @OA\Property(
     *     title="type",
     *     description="type (POSITIVE or NEGATIVE)",
     *     example="POSITIVE"
     * )
     * @var string
     */

    private $type;

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
        'user_id', 'startup_id', 'direction', 'message', 'type'
    ];
}
