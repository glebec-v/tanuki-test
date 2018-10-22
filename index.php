<?php

include __DIR__.'/vendor/autoload.php';

$input = 'EUR/USD';
$isoCodes = explode("/", $input);
if (2 !== count($isoCodes)) {
    return 'Incorrect currency pair format';
}

$rate = (new \App\Main)->run($isoCodes);

// return ?