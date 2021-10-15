<?php

namespace App\Traits;

trait Utils 
{
    private function fib($n)
    {
        if ($n <= 2) return 1; 

        return $this->fib($n-1) + $this->fib($n-2);
    }

    public function generateFibonacciNumbers(): array 
    { 
        return array();
    }
}