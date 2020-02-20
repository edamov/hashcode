<?php

$host = 'mariadb';
$user = 'root';
$password = 'root';
$dbname = 'default';

$db = new PDO('mysql:host=' . $host . ';port=3306;dbname=' . $dbname, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
foreach($db->query('SELECT * from `test`') as $row) {
    print_r($row);
}
