<?php

namespace App\Model;


use App\ValueObject\Currency;
use http\Exception\InvalidArgumentException;

class Rate
{
    private $rate;
    private $baseCurrency;
    private $secondCurrency;

    public function __construct(Currency $baseCurrency, Currency $secondCurrency, $rate = null)
    {
        $this->baseCurrency   = $baseCurrency;
        $this->secondCurrency = $secondCurrency;
        if ($baseCurrency->equals($secondCurrency)) {
            $this->rate = 1;
        } else {
            $this->rate = $rate;
        }
    }

    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    public function rateOf(Currency $currency)
    {
        if ($this->baseCurrency->equals($currency)) {
            return $this->rate;
        }
        if ($this->secondCurrency->equals($currency)) {
            return 1 / $this->rate;
        }
        throw new InvalidArgumentException();
    }
}