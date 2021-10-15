<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFib()
    {
        $this->assertTrue($this->fib(25) == 75025);
    }

    public function testFibMemo()
    {
        $this->assertTrue($this->fibMemo(25, []) == 75025);
    }

    public function testGenerateFibNumbers()
    {
        $this->assertTrue(count($this->generateFibNumbers()) == 15);
    }

    private function fib($n)
    {
        if ($n <= 2) return 1; 

        return $this->fib($n-1) + $this->fib($n-2);;
    }
    
    private function fibMemo($n, $memo)
    {
        if (array_key_exists($n, $memo)) return $memo[$n];
        if ($n <= 2) return 1; 

        $memo[$n] = $this->fib($n-1, $memo) + $this->fib($n-2, $memo);

        return $memo[$n];
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
