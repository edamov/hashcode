<?php

define('OUTPUT_PATH',  __DIR__ . '/output');

function write($name, $result, $libraries) {
    if (!is_dir(OUTPUT_PATH) && !mkdir($concurrentDirectory = OUTPUT_PATH) && !is_dir($concurrentDirectory)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
    }
    $handler = fopen(__DIR__  . '/output/' . $name . time() . '.out', 'w');

    $librariesCount = count($result);

    $firstLine = $librariesCount;

    fwrite($handler, $firstLine . PHP_EOL);
    foreach($result as $key => $library){
//        var_dump($library);
//        exit;
        $lib = $library;
//        $lib = $libraries[$key];
        $libraryNumber = ($lib['key'] / 2) - 1;
        $booksAmount = count($lib['books']);
        $booksOrder = implode(' ', $lib['books']);
        $line = $libraryNumber . ' ' . $booksAmount . PHP_EOL;
        $line .= $booksOrder;

        fwrite($handler, $line);
    }
    fclose($handler);
}

