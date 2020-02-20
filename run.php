<?php

ini_set('memory_limit', -1);

require_once 'input.php';
//require_once 'db.php';
require_once 'solution.php';
require_once 'output.php';

$inputTasks = [
    'a' => 'a_example',
    'b' => 'b_read_on',
    'c' => 'c_incunabula',
    'd' => 'd_tough_choices',
    'e' => 'e_so_many_books',
    'f' => 'f_libraries_of_the_world',
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

$result = run($parserResult['params'], $parserResult['libraries'], $parserResult['scores']);

write($inputTasks[$currentTask], $result, $parserResult['libraries']);

