<?php
include_once('config.php');
include_once('Database/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database($BASE_DIR . '/' . $DB_PATH);
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