<?php

$host = "localhost";
$dbname = "sheesh";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                    username: $username,
                    password: $password,
                    database: $dbname);

if ($mysqli->connect_error) {
    die ("Connection error: " . $mysqli->connect_error);
}

return $mysqli;