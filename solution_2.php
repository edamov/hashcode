<?php

function run($params, $libraries, $scores) {
    $calcScore = [];
    $availableDays = $params['daysAmount'];

    foreach ($libraries as $key => $library) {
//        $libSum = 0;
//        foreach ($library['books'] as $key => $item) {
//            $libSum += $scores[$key];
//        }


        $libraryScore = ($availableDays - $library['info']['signupDays']);

//        if ($libraryScore < 1) {
//            continue;
//        }

        $calcScore[$key] = $library['info']['signupDays'];
    }

    asort($calcScore);

    $newCalcScore = [];
    foreach ($calcScore as $key => $item) {

        $availableDays -= $item;
        if ($availableDays < 0) {
            break;
        }

        $newCalcScore[$key] = $item;
    }

    return $newCalcScore;
}
