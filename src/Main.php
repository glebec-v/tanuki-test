<?php

namespace App;

use App\Repository\CacheRepository;
use App\Repository\DbRepository;
use App\Repository\OutHttpRepository;

class Main
{
    public function run($isoCodes)
    {
        try {
            $cache = new CacheRepository();
            $rate = $cache->getRate();
            if (!is_null($rate)) {
                return $rate;
            }

            $db = new DbRepository();
            $rate = $db->getRate();
            if (!is_null($rate)) {
                $cache->setRate($rate);
                return $rate;
            }

            $out = new OutHttpRepository();
            $rate = $out->getRate();
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