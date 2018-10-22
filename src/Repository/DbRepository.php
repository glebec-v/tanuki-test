<?php

namespace App\Repository;

use App\Model\Rate;
use App\GetRateInterface;
use App\SetRateInterface;

class DbRepository implements GetRateInterface, SetRateInterface
{

    public function getRate(Rate $rate): ?Rate
    {
        // TODO: Implement getRate() method.
        $rate->setRate(1);
        return $rate;
    }

    public function setRate(Rate $rate): void
    {
        // TODO: Implement setRate() method.
    }
}