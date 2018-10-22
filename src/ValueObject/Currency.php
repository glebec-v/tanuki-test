<?php

namespace App\ValueObject;

class Currency
{
    private $isoCode;

    public function __construct($anIsoCode)
    {
        $this->setIsoCode($anIsoCode);
    }

    public function isoCode()
    {
        return $this->isoCode;
    }

    public function equals(Currency $currency)
    {
        return $currency->isoCode() === $this->isoCode();
    }

    private function setIsoCode($anIsoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $anIsoCode)) {
            throw new \InvalidArgumentException();
        }
        $this->isoCode = $anIsoCode;
    }
}