<?php
include_once('config.php');
include_once('Database/database.php');

$db = new Database($BASE_DIR . '/' . $DB_PATH);
// print_r($db->list());  
print_r($db->create(array(
    "title" => 'Introduction to Algorithm',
    "author" => 'Corman',
    'available' => true,
    'isbn' => '1234555667'
)));  

print_r($db->list());