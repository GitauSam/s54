<?php

namespace App\Traits;

trait Utils 
{
    private function fib($n)
    {
        if ($n <= 2) return 1; 

        return $this->fib($n-1) + $this->fib($n-2);;
    }

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
}