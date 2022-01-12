<?php
include_once('App/config.php');
include_once('App/Database/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS);
    $obj = $db->delete($id);

    if (empty($obj)) {
        header('Location: 404.php');
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: 404.php');
}
die();

?>