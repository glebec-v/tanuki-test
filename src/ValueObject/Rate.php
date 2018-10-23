<?php

namespace App\ValueObject;

use App\DTO\CurrencyCodes;
use http\Exception\InvalidArgumentException;

/**
 * Class Rate
 * @package App\ValueObject
 *
 * @property CurrencyCodes $currencyCodes
 * @property float         $rate
 */
class Rate
{
    private $rate;
    private $currencyCodes;

    // semantic constructors
    public static function fromNames(CurrencyCodes $codes): Rate
    {
        return new self($codes);
    }

    public static function fromRate($rateValue, Rate $rate): Rate
    {
        return $rate->setRate($rateValue);
    }

    // model interface
    public function rateOf(Currency $currency)
    {
        if ($this->currencyCodes->baseCurrency->equals($currency)) {
            return $this->rate;
        }
        if ($this->currencyCodes->secondCurrency->equals($currency)) {
            return 1 / $this->rate;
        }
        throw new InvalidArgumentException();
    }

    public function __toString(): string
    {
        return "{$this->currencyCodes->baseCurrency}/{$this->currencyCodes->secondCurrency}={$this->rate}";
    }

    // private methods
    private function __construct(CurrencyCodes $codes)
    {
        $this->currencyCodes = $codes;
        $this->rate = 1;
    }

    private function setRate($rate): Rate
    {
        $this->rate = $rate;
        return $this;
    }
}