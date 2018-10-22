<?php

namespace App;

use App\Model\Rate;
use App\Repository\CacheRepository;
use App\Repository\DbRepository;
use App\Repository\OutHttpRepository;
use App\ValueObject\Currency;

class Main
{
    public function run($isoCodes)
    {
        $requiredRate = new Rate(new Currency($isoCodes[0]), new Currency($isoCodes[1]));

        try {
            $cache = new CacheRepository();
            $rate = $cache->getRate($requiredRate);
            if (!is_null($rate)) {
                return $rate;
            }

            $db = new DbRepository();
            $rate = $db->getRate($requiredRate);
            if (!is_null($rate)) {
                $cache->setRate($rate);
                return $rate;
            }

            $out = new OutHttpRepository();
            $rate = $out->getRate($requiredRate);
            if (!is_null($rate)) {
                $cache->setRate($rate);
                $db->setRate($rate);
                return $rate;
            }

            // nothing found
            return null;
        } catch (\Exception $exception) {
            return null;
        }
    }

}