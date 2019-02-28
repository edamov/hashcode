<?php
require_once 'parser.php';

$inputFiles = [
    'a' => 'a_example.in',
    'b' => 'b_small.in',
    'c' => 'c_medium.in',
    'd' => 'd_big.in',
];

$inputPath = 'input/' . $inputFiles['c'];
$parserResult = parseInput($inputPath);

var_dump($parserResult);
