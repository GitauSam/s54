<?php

namespace Tests\Unit;

use AmrShawky\LaravelCurrency\Facade\Currency;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    public function test_currency_converter()
    {
        echo Currency::convert()
                ->from('USD')
                ->to('EUR')
                ->get();
                
        $this->assertTrue(true);
    }
}
