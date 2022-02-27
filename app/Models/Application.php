<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Application",
 *     description="Application model",
 *     @OA\Xml(
 *         name="Application"
 *     )
 * )
 */
class Application extends Model
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     example=1
     * )
     *  @var integer
     */

    private $id;

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
     *     title="startup_id",
     *     description="startup_id",
     *     example=1
     * )
     * @var integer
     */

    private $startup_id;

    /**
     * @OA\Property(
     *     title="message",
     *     description="message",
     *     example="I want to work hard and cry about it"
     * )
     * @var string
     */

    private $message;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status (CREATED or APPLIED or FIRED)",
     *     example="CREATED"
     * )
     * @var string
     */

    private $status;

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
        'user_id', 'startup_id', 'message', 'status'
    ];
}
