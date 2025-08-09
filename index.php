<?php
$uploadDir = __DIR__ . "/files123/";

if (isset($_FILES['userfile'])) {
    $file = $_FILES['userfile'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die("Error: " . $file['error']);
    }

    $maxSize =10 * 1024 * 1024;
    if ($file['size'] > $maxSize) {
        die('файл сишком большой');
    }

    $originalName = $_FILES['userfile']['name'];
    $destination = $uploadDir . $originalName;

    if (!is_uploaded_file($file['tmp_name'])) {
        die('файл загружен не через post');
    }

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo 'файл загружен';
    } else {
        echo 'ошибка при загрузке';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>загрузка файла</title>
</head>
<body>
<h1>выбрать файл</h1>
<p>здесь выберите файл</p>
<form action="/index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="userfile"/>
    <input type="submit" value="загрузить"/>
</form>
</body>
</html>

