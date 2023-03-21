<?php

$server = 'localhost';
$db = 'pizzeria';
$user = 'root';
$password = '';


$conn = new mysqli($server, $user, $password, $db);


if (!$conn){
    echo "something happend :o";
}

?>