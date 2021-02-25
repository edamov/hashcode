<?php

function parseInput($path) {
    $f = fopen('input/' . $path . '.txt', 'r');
    if ($f === false) {
        die('Input file doesn\'t exists');
    }

    $isFirstLine = true;
    $streets = [];
    $ways = [];
    $params = [];
    $i = 0;

    while ($line = fgets($f)) {
        if ($isFirstLine) {
            $i = 1;
            list($params['seconds'], $params['intersections'], $params['streets'], $params['cars'], $params['points']) =
                array_map('intval', explode(' ', $line));
            $isFirstLine = false;
        } else {
            $line = explode(' ',$line);

            if ($i <= $params['streets']) {
                $streets[] = [
                    'start_intersection' => $line[0],
                    'end_intersection' => $line[1],
                    'name' => $line[2],
                    'duration' => $line[3],
                ];
                $i++;
            } else {
                $startIntersection = $line[0];
                unset($line[0]);

                $ways[] = [
                    'start_intersection' => $startIntersection,
                    'path' => $line,
                ];
            }


        }
    }

    return [
        'streets' => $streets,
        'ways' => $ways,
        'params' => $params,
    ];
}
