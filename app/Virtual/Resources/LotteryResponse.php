<?php

namespace App\Modules;

/**
 * @OA\Schema(
 *     title="S54 Lottery",
 *     description="Lottery Response model",
 *     @OA\Xml(
 *         name="LotteryResponse"
 *     )
 * )
 */
class LotteryResponse
{
    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     format="string",
     *     example="0"
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="message",
     *     description="message",
     *     format="string",
     *     example="Congratulations ..."
     * )
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(
     *     title="winning_numbers",
     *     description="winning numbers",
     *     format="array",
     *     example="[1, 2, 3]"
     * )
     *
     * @var string
     */
    public $winning_numbers;
}