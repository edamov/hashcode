<?php

function run($params, $libraries, $scores) {
    $calcScore = [];
    $availableDays = $params['daysAmount'];
    $signupMin = $libraries[0]['info']['signupDays'];
    $maxSum = 0;

    foreach ($libraries as $key => $library) {
        if($library['info']['signupDays'] < $signupMin) {
            $signupMin = $library['info']['signupDays'];
        }

        $libSum = 0;
        foreach ($library['books'] as $key1 => $item) {
            $libSum += $scores[$key1];
        }

        if ($libSum > $maxSum) {
            $maxSum = $libSum;
        }

    }



    foreach ($libraries as $key => $library) {
        $part1 = $signupMin / $library['info']['signupDays'] * 100;


        $libSum = 0;
        foreach ($library['books'] as $key1 => $item) {
            $libSum += $scores[$key1];
        }

        $part2 = $libSum / $maxSum * 100;

        $calcScore[$key] = $part1 + $part2;


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
