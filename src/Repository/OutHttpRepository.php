<?php

namespace App\Repository;

use App\DTO\CurrencyCodes;
use App\ValueObject\Rate;
use App\GetRateInterface;

class OutHttpRepository implements GetRateInterface
{

    public function getRate(CurrencyCodes $names): ?Rate
    {
        // TODO: Implement getRate() method.
        // rate value:
        $value = 0.5;
        $rate = Rate::fromRate($value, Rate::fromNames($names));
        return $rate;
    }
}