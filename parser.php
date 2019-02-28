<?php

function parseInput($path) {
    $f = fopen($path, 'r');
    if ($f === false) {
        die('Input file doesn\'t exists');
    }

    $isFirstLine = true;
    $rows = [];
    $params = [];
    
    while ($line = fgets($f)) {
        if ($isFirstLine) {
            list($params['a'], $params['b'], $params['c'], $params['d']) =
                array_map('intval', explode(' ', $line));
            $isFirstLine = false;
        } else {
            $rows[] = trim($line);
        }
    }

    return [
        'rows' => $rows,
        'params' => $params,
    ];
}
