<?php
require_once 'input.php';
//require_once 'db.php';
require_once 'solution.php';
require_once 'output.php';

$inputTasks = [
    'a' => 'a_example',
    'b' => 'b_small',
    'c' => 'c_medium',
    'd' => 'd_big',
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

run($parserResult['params'], $parserResult['rows']);

write($parserResult['rows'], $inputTasks[$currentTask]);

