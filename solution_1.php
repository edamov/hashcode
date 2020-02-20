<?php

function run($params, $libraries, $scores) {
    $calcScore = [];
    $availableDays = $params['daysAmount'];

    foreach ($libraries as $key => $library) {
        $libraryScore = ($availableDays - $library['info']['signupDays']) * $library['info']['booksPerDay'];

        if ($libraryScore < 1) {
            continue;
        }

        $calcScore[$key] = $libraryScore;
    }

    arsort($calcScore);

    return $calcScore;
}
