<?php 

include_once('App/config.php');
include_once('App/Database/database.php');

if(!isset($_SERVER['REQUEST_METHOD'])){
    $sql = "CREATE TABLE  IF NOT EXISTS books (
        id SERIAL PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        author VARCHAR(255) NOT NULL,
        available BOOLEAN NOT NULL,
        isbn VARCHAR(255) NOT NULL
    )";
    $pdo = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    $pdo->query($sql);
}