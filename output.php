<?php

define('OUTPUT_PATH',  __DIR__ . '/output');

function write($data, $name) {
    if (!is_dir(OUTPUT_PATH) && !mkdir($concurrentDirectory = OUTPUT_PATH) && !is_dir($concurrentDirectory)) {
        throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
    }
    $handler = fopen(__DIR__  . '/output/' . $name . time() . '.out', 'w');

    foreach($data as $row){
        fwrite($handler, $row . PHP_EOL);
    }
    fclose($handler);
}

