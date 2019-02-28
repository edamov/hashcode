<?php

function zip()
{
    exec('zip -r output/source' . time() .'.zip *.php');
}

zip();
