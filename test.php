<?php
include_once('config.php');
include_once('Database/database.php');

$db = new Database($BASE_DIR . '/' . $DB_PATH);
// print_r($db->list());  
// print_r($db->get(2));  
// $db->update(2, array('title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'available' => true, 'isbn' => '978-0-306-40615-7'));
// print_r($db->list());

$d = $db->search('A');
print_r($d);