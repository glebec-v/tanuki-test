<?php

namespace App;

use App\Model\Rate;

interface GetRateInterface
{
    public function getRate(Rate $rate): ?Rate;
}