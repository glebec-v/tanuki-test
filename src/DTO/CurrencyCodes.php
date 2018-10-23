<?php

namespace App\DTO;

use App\ValueObject\Currency;

class CurrencyCodes
{
    public $baseCurrency;
    public $secondCurrency;

    public function __construct(Currency $baseCurrency, Currency $secondCurrency)
    {
        $this->baseCurrency   = $baseCurrency;
        $this->secondCurrency = $secondCurrency;
    }

}