<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
use Gocanto\Converter\Examples\CurrenciesRepositoryExample;
use Gocanto\Converter\Converter;
use Gocanto\Converter\RoundedNumber;
use App\Traits\Utils;

class LotteryController extends Controller
{

    use Utils;

    /**
     * @OA\Get(
     *      path="/lottery/{number}/{country}",
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
     *       ),
     *     )
     */
    public function lottery($number, $country)
    {
        try {
            $pool = $this->generateFibNumbers();
            shuffle($pool);
            $winningPool = array_splice($pool, 0, 3);

            if (in_array($number, $winningPool)) {
                return response()
                    ->json([
                        "status" => "0",
                        "message" => "Congratulations!",
                        "winning_numbers" => json_encode($winningPool)
                    ]);
            } else {
                return response()
                    ->json([
                        "status" => "0",
                        "message" => "Tough luck! Try again next time.",
                        "winning_numbers" => json_encode($winningPool)
                    ]);
            }
        } catch (\Exception $e) {
            return response()
                ->json([
                    "status" => "99",
                    "message" => "Unable to process request. Error: " . $e->getMessage(),
                ]);
        }
    }
}
