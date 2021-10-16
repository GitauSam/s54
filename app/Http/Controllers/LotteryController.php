<?php

namespace App\Http\Controllers;

use App\Http\Resources\LotteryResource;
use App\Traits\Utils;
use App\Models\LotteryResponse;

class LotteryController extends Controller
{

    use Utils;

    /**
     * @OA\Get(
     *      path="/api/lottery/{number}/{country}",
     *      operationId="getLotteryResults",
     *      tags={"LotteryResults"},
     *      summary="Get lottery results",
     *      description="Returns lottery results",
     *      @OA\Parameter(
     *          name="number",
     *          description="Lottery Number",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="country",
     *          description="Country of Origin",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/LotteryResponse")
     *       ),
     *     )
     */
    public function lottery($number, $country)
    {
        try {
            if ($number == null || $country == null || empty($number) || empty($country))
                throw new \Exception("Invalid input details");

            $pool = $this->generateFibNumbers();
            
            if (!shuffle($pool)) throw new \Exception("Could not shuffle pool");

            $winningPool = array_splice($pool, 0, 3);

            $lotteryResponse = new LotteryResponse();
            $lotteryResponse->status = "0";
            $lotteryResponse->winning_numbers = $winningPool;

            if (in_array($number, $winningPool)) {
                $details = $this->getWinningAmount(ucfirst(strtolower($country)));

                $lotteryResponse->message = "Congratulations! You have won " 
                                                . $details["currency"] 
                                                . " " 
                                                . round($details["amount"], 2);

                return new LotteryResource($lotteryResponse);

            } else {
                $lotteryResponse->message = "Tough luck! Try again next time";
                
                return new LotteryResource($lotteryResponse);
            }
        } catch (\Exception $e) {
            $lotteryResponse = new LotteryResponse();
            $lotteryResponse->status = "99";
            $lotteryResponse->message = "Unable to process request. Error: " . $e->getMessage();
            return new LotteryResource($lotteryResponse);
        }
    }
}
