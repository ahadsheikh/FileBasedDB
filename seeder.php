<?php 

include_once('App/config.php');

if(!isset($_SERVER['REQUEST_METHOD'])){
    $sqls = [
        "INSERT INTO books (title, author, available, isbn) VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', true, '978-0-306-40615-7')",
        "INSERT INTO books (title, author, available, isbn) VALUES ('Introduction to Algorithms', 'Thomas H. Cormen', true, '978-0-306-40615-7')",
        "INSERT INTO books (title, author, available, isbn) VALUES ('Mathematics for Computer Science', 'Eric Lehman', true, '978-0-306-40615-7')",
        "INSERT INTO books (title, author, available, isbn) VALUES ('Habijabi', 'F. Scott Fitzgerald', false, '978-0-306-40615-7')",
    ];
    $pdo = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    foreach($sqls as $sql){
        $pdo->query($sql);
    }
}