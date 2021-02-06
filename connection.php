<?php

$host = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'student_db';

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    echo "Could not connect MySQL";
}
