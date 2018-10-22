<?php

namespace App\Repository;

use App\Model\Rate;
use App\GetRateInterface;

class OutHttpRepository implements GetRateInterface
{

    public function getRate(Rate $rate): ?Rate
    {
        // TODO: Implement getRate() method.
        $rate->setRate(1);
        return $rate;
    }
}