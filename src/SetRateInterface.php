<?php

namespace App;

use App\Model\Rate;

interface SetRateInterface
{
    public function setRate(Rate $rate): void;
}