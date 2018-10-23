<?php

namespace App\Model;

use App\DTO\CurrencyCodes;
use App\Repository\CacheRepository;
use App\Repository\DbRepository;
use App\Repository\OutHttpRepository;

class RateRetriever
{
    private $currencyCodes;

    private $cache;
    private $db;
    private $http;

    public static function fromCurrencyCodes(CurrencyCodes $codes): RateRetriever
    {
        return new self($codes);
    }

    public function getRate()
    {
        try {
            $rate = $this->cache->getRate($this->currencyCodes);
            if (!is_null($rate)) {
                return $rate;
            }

            $rate = $this->db->getRate($this->currencyCodes);
            if (!is_null($rate)) {
                $this->cache->setRate($rate);
                return $rate;
            }

            $rate = $this->http->getRate($this->currencyCodes);
            if (!is_null($rate)) {
                $this->cache->setRate($rate);
                $this->db->setRate($rate);
                return $rate;
            }

            // nothing found
            return '';
        } catch (\Exception $exception) {
            return '';
        }
    }

    private function __construct(CurrencyCodes $codes)
    {
        $this->currencyCodes = $codes;
        $this->cache = new CacheRepository();
        $this->db    = new DbRepository();
        $this->http  = new OutHttpRepository();
    }

}