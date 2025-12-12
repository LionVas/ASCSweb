<?php
$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Васильев Леонид</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class = "container d-flex justify-content-center align-items-center vh-100">
        <div class = "row">
            <div class = "col-12 text-center">
               <?php 
                echo "<h1> $title </h1>";
                echo "<p> $main_text </p>";

               ?>
            </div>
        </div>

    </div>
</body>
</html>