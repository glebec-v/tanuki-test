<?php

namespace App;

use App\DTO\CurrencyCodes;
use App\ValueObject\Rate;

interface GetRateInterface
{
    public function getRate(CurrencyCodes $names): ?Rate;
}