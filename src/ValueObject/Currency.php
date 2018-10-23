<?php

namespace App\ValueObject;

/**
 * Class Currency
 * @package App\ValueObject
 *
 * thanks to Carlos Buenosvinos, Christian Soronellas and Keyvan Akbary
 * book Domain-Driven Design in PHP
 */
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

    public function __toString(): string
    {
        return $this->isoCode();
    }

    private function setIsoCode($anIsoCode)
    {
        if (!preg_match('/^[A-Z]{3}$/', $anIsoCode)) {
            throw new \InvalidArgumentException();
        }
        $this->isoCode = $anIsoCode;
    }
}