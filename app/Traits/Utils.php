<?php

namespace App\Traits;

use AmrShawky\LaravelCurrency\Facade\Currency;
use PragmaRX\Countries\Package\Services\Countries;

trait Utils 
{
    /**
     * Returns fibonacci number at position 'n'
     * @param integer $n fibonacci position
     * @return integer fibonacci number at position 'n'
     */
    private function fib($n)
    {
        if ($n <= 2) return 1; 

        return $this->fib($n-1) + $this->fib($n-2);;
    }

    /**
     * Returns fibonacci numbers 1 >= n <= 1000
     * @return array of fibonacci numbers
     */
    private function generateFibNumbers(): array
    {
        $count = 3;
        $fibNos = [1];

        while(true) 
        {
            $res = $this->fib($count);
            if ($res > 1000) 
            {
                break;
            }
            array_push($fibNos, $res);
            $count++;
        }

        return $fibNos;
    }

    /**
     * @param string $country 
     * @return array associative array of amount and country details
     */
    private function getWinningAmount($country)
    {
        $countries = new Countries();
        $currency = $countries->whereNameCommon($country)->pluck('currencies')[0][0];

        return [
            "currency" => $currency,
            "amount" => Currency::convert()
                            ->from('USD')
                            ->to($currency)
                            ->get() * 2
        ];
    }
}