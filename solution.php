<?php

function run($params, $libraries, $scores) {
    $calcScore = [];
    $availableDays = $params['daysAmount'];
    $allBooks = [];
    $resultLibraries = [];

    foreach ($libraries as $library) {
        $allBooks = array_merge($allBooks, $library['books']);
    }

    $allBooks = array_flip($allBooks);

    do {
        $calcScore = [];
        foreach ($libraries as $key => $library) {
            $libSum = 0;
            foreach ($library['books'] as $key1 => $item) {
                if (isset($allBooks[$item])) {
                    $libSum += $scores[$key1];
                }
            }

            $calcScore[$key] = $libSum / $library['info']['signupDays'];
        }
        arsort($calcScore);

        $firstKey = array_key_first($calcScore);


        $library = $libraries[$firstKey];

        foreach ($library['books'] as $book) {
            unset($allBooks[$book]);
        }

        unset($libraries[$firstKey]);

        $availableDays -= $library['info']['signupDays'];
        $library['key'] = $firstKey;
        $resultLibraries[] = $library;

    }while (count($libraries)!== 0 ||  $availableDays > 0);



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

    return $resultLibraries;
}
