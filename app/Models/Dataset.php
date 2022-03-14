<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Dataset",
 *     description="Dataset model",
 *     @OA\Xml(
 *         name="Dataset"
 *     )
 * )
 */
class Dataset extends Model
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
     *     title="user_id",
     *     description="user_id",
     *     example=1
     * )
     * @var integer
     */

    private $user_id;

    /**
     * @OA\Property(
     *     title="moderatable_id",
     *     description="moderatable_id",
     *     example=1
     * )
     * @var integer
     */

    private $moderatable_id;

    /**
     * @OA\Property(
     *     title="moderatable_type",
     *     description="one of ROLE_CREATOR, ROLE_APPLICANT, STARTUP",
     *     example="ROLE_CREATOR"
     * )
     * @var string
     */

    private $moderatable_type;

    /**
     * @OA\Property(
     *     title="content",
     *     description="content",
     *     example="Documents 123"
     * )
     * @var string
     */

    private $content;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     example="CREATED"
     * )
     * @var string
     */

    private $status;

    /**
     * @OA\Property(
     *     title="comment",
     *     description="comment",
     *     example="Wrong name"
     * )
     * @var string
     */

    private $comment;

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
        'user_id', 'moderatable_id', 'moderatable_type', 'content', 'status', 'comment'
    ];
}
