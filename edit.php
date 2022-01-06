<?php
include_once('config.php');
include_once('Database/database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = htmlspecialchars($_POST['id']);
    $obj = array(
        'title' => htmlspecialchars($_POST['title']),
        'author' => htmlspecialchars($_POST['author']),
        'available' => (boolean)htmlspecialchars($_POST['available']) ? true : false,
        'isbn' => htmlspecialchars($_POST['isbn'])
    );

    $db = new Database($BASE_DIR . '/' . $DB_PATH);
    $status = $db->update($id, $obj);
    if($status){
        header('Location: '.'/show.php?id=' . $id);
    }else{
        header('Location: ' . $BASE_URL . '/error.php');
    }
    die();
}else{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $db = new Database($BASE_DIR . '/' . $DB_PATH);
        $obj = $db->get($id);
    
        if(empty($obj)) {
            header('Location: 404.php');
            die();
        }
    } else {
        header('Location: 404.php');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Book</title>
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
            <h1 style="text-align: center;">Update Book</h1>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <div class="flex-container input-group">
                    <label class="input-label" for="">Title</label>
                    <input class="input-field" type="text" name="title" value="<?php echo $obj['title']?>" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Author</label>
                    <input class="input-field" type="text" name="author" value="<?php echo $obj['author']?>" required>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">Availablity</label>
                    <div class="flex-container" style="width: 80%; justify-content: start;">
                        <div><input type="radio" name="available" value="1" <?php echo $obj['available'] ? 'checked="checked"' : '' ?> required> True</div>
                        <div><input type="radio" name="available" value="0" <?php echo $obj['available'] ? '' : 'checked="checked"' ?> > False</div>
                    </div>
                </div>
                <div class="flex-container input-group">
                    <label class="input-label" for="">ISBN</label>
                    <input class="input-field" type="text" name="isbn" value="<?php echo $obj['isbn']?>" required>
                </div>
                <div class="flex-container" style="justify-content: center;">
                    <input class="btn-create" type="submit" value="Update" required>
                </div>
            </form>
        </div>
    </div>
</body>

</html>