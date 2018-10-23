<?php

namespace App\Repository;

use App\DTO\CurrencyCodes;
use App\ValueObject\Rate;
use App\GetRateInterface;
use App\SetRateInterface;

class CacheRepository implements GetRateInterface, SetRateInterface
{

    public function getRate(CurrencyCodes $names): ?Rate
    {
        // TODO: Implement getRate() method.
        // rate value:
        $value = 0.5;
        $rate = Rate::fromRate($value, Rate::fromNames($names));
        return $rate;
    }

    public function setRate(Rate $rate): void
    {
        // TODO: Implement setRate() method.
    }
}