<?php

function parseInput($path) {
    $f = fopen('input/' . $path . '.txt', 'r');
    if ($f === false) {
        die('Input file doesn\'t exists');
    }

    $isFirstLine = true;
    $isSecondLine = false;
    $params = [];
    $libraries = [];
    $scores = [];

    $i = 0;
    while ($line = fgets($f)) {
        if ($isFirstLine) {
            list($params['booksAmount'], $params['librariesAmount'], $params['daysAmount']) =
                array_map('intval', explode(' ', $line));
            $isFirstLine = false;
            $isSecondLine = true;
        } elseif ($isSecondLine) {
            $scores = explode(' ', $line);
            $isSecondLine = false;
        } else {
            if ($i % 2 === 0) {
                list($library['booksAmount'], $library['signupDays'], $library['booksPerDay']) =
                    array_map('intval', explode(' ', $line));

                if(!$library['booksAmount']) {
                    break;
                }

                $libraries[$i]['info'] = $library;
            } else {
                $libraries[$i - 1]['books'] = explode(' ', $line);
            }
        }
        $i++;
    }

    return [
        'params' => $params,
        'libraries' => $libraries,
        'scores' => $scores
    ];
}

function parseLine($line) {

}
