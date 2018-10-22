<?php

namespace App\Repository;

use App\Model\Rate;
use App\GetRateInterface;
use App\SetRateInterface;

class CacheRepository implements GetRateInterface, SetRateInterface
{

    public function getRate(): ?Rate
    {
        // TODO: Implement getRate() method.
    }

    public function setRate(Rate $rate): void
    {
        // TODO: Implement setRate() method.
    }
}