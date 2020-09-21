#!/bin/php
<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Hibo\Console;

$t =  Console::read('Simple read test');
var_dump($t);
echo PHP_EOL;

$t =  Console::read('Simple read test', 1, ['1' => 'Option 1', '2' => 'Option 2', '3' => 'Option 3']);
var_dump($t);
echo PHP_EOL;


$t =  Console::yesNo('Yes,no test');
var_dump($t);
echo PHP_EOL;




