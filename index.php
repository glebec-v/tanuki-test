<?php

include __DIR__.'/vendor/autoload.php';

// for demo purpose
$input = 'EUR/USD';
$isoCodes = explode("/", $input);
if (2 !== count($isoCodes)) {
    echo 'Incorrect currency pair format';
}

$codes = new \App\DTO\CurrencyCodes(
    new \App\ValueObject\Currency($isoCodes[0]),
    new \App\ValueObject\Currency($isoCodes[1])
);

echo (\App\Model\RateRetriever::fromCurrencyCodes($codes))->getRate().PHP_EOL;