<?php

$host = 'mysql';
$user = 'root';
$password = 'root';
$dbname = 'default';

$db = new PDO('mysql:host=' . $host . ';dbname= ' . $dbname, $user, $pass);

//foreach($db->query('SELECT * from FOO') as $row) {
//    print_r($row);
//}
