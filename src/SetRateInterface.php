<?php

namespace App;

use App\ValueObject\Rate;

interface SetRateInterface
{
    public function setRate(Rate $rate): void;
}