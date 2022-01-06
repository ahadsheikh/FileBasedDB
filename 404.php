<?php 
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Not Found</title>
</head>
<body>
    <nav class="container">
        <div class="flex-container" style="width: 100%; justify-content: space-between;">
            <a class="btn-a" href="<?php echo $BASE_URL ?>"><h1>DB Home</h1></a>
        </div>
    </nav>
    <div class="not-found">
        <span>404</span> <span>Not Found</span>
    </div>
</body>
</html>