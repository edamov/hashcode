<?php
require_once 'input.php';
//require_once 'db.php';
require_once 'solution.php';
require_once 'output.php';

$inputTasks = [
    'a' => 'a',
    'b' => 'b',
    'c' => 'c',
    'd' => 'd',
    'e' => 'e',
    'f' => 'f',
];

if (isset($argv[1]) && array_key_exists($argv[1], $inputTasks)) {
    $currentTask = $argv[1];
} else {
    $currentTask = 'a';
}


/**
 * ['params' => ..., 'rows' => ...]
 */
$parserResult = parseInput($inputTasks[$currentTask]);

var_dump($parserResult);
exit;

run($parserResult['params'], $parserResult['rows']);

write($parserResult['rows'], $inputTasks[$currentTask]);

