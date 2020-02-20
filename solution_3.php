<?php

function run($params, $libraries, $scores) {
    $calcScore = [];
    $availableDays = $params['daysAmount'];
    $allBooks = [];

    foreach ($libraries as $library) {
        $allBooks = array_merge($allBooks, $library['books']);
    }

    var_dump($allBooks);
    exit;

    foreach ($libraries as $key => $library) {
        $libSum = 0;
        foreach ($library['books'] as $key1 => $item) {
            $libSum += $scores[$key1];
        }

//        $calcScore[$key]['sum'] = '';

        $calcScore[$key] = $libSum / $library['info']['signupDays'];


//        $libraryScore = ($availableDays - $library['info']['signupDays']);

//        if ($libraryScore < 1) {
//            continue;
//        }

//        $calcScore[$key] = $library['info']['signupDays'];
    }
    arsort($calcScore);

//    $newCalcScore = [];
//    foreach ($calcScore as $key => $item) {
//
//        $availableDays -= $item;
//        if ($availableDays < 0) {
//            break;
//        }
//
//        $newCalcScore[$key] = $item;
//    }

    return $calcScore;
}
