<?php
include_once('config.php');
include_once('Database/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $obj = array(
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'available' => (boolean)$_POST['available'] ? true : false,
        'isbn' => $_POST['isbn']
    );

    $db = new Database($BASE_DIR . '/' . $DB_PATH);
    $status = $db->create($obj);
    if($status){
        header('Location: ' . $BASE_URL . '/show.php?id=' . $status);
    }else{
        header('Location: ' . $BASE_URL . '/error.php');
    }
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Create Book</title>
</head>

<body>
    <nav class="container">
        <div class="flex-container" style="width: 100%; justify-content: space-between;">
            <a class="btn-a" href="<?php echo $BASE_URL ?>">
                <h1>DB Home</h1>
            </a>
        </div>
    </nav>
    <div class="flex-container" style="justify-content: center;">
        <div class="book-obj">
            <h1 style="text-align: center;">Create a Book</h1>
            <form action="" method="post">
                <div class="flex-container input-group">
                    <label class="input-label" for="">Title</label>
                    <input class="input-field" type="text" name="title" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Author</label>
                    <input class="input-field" type="text" name="author" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Availablity</label>
                    <div class="flex-container" style="width: 80%; justify-content: start;">
                        <div><input type="radio" name="available" value="1" required> True</div>
                        <div><input type="radio" name="available" value="0"> False</div>
                    </div>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">ISBN</label>
                    <input class="input-field" type="text" name="isbn" required>
                </div>
                <div class="flex-container" style="justify-content: center;">
                    <input class="btn-create" type="submit" value="Create" required>
                </div>
            </form>
        </div>
    </div>
</body>

</html>