<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Васильев Леонид</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles/styles.css">
    
</head>
<body>
   <div class="navbar navbar-dark bg-dark p-3">
        <div class = "container-fluid">

            <a href ="#" class = "navbar-brand d-flex align-items-center">
                <img src = "images/rab.jpg" alt = "Лого" class = "me-2 rabbit rounded-circle">
                <span class = "text-light">Леонид Васильев</span>                
            </a>
            <?php  if(isset($_COOKIE['User'])): ?>
                <form action="/logout.php" method = "POST" class="d-flex">
                    <button class = "btn btn-outline-danger" type="submit">Logout</logout>
                </form>
            <?php endif;?>
        </div>
   </div>
   <div class = "container mt-5">
        <div class = "story-text">
            <p>Меня зовут Васильев Леонид и я пытаюсь делать модуль по сетям, но там куча проблем поэтому пока делаю веб</p>
            <img src = "images/fih.jpg" alt = "брдыщ" class = "fun-img">
        </div>
        <div class = "text-center mt-4">
            <button id ="toggleButton" class="btn btn-primary"> Открыть</button>
        </div>
        <div id = "extraImage" class = "mt-3 text-center" style="display: none">
            <img class = "fun-img" src = "images/miyabi.jpg" alt = "скрытая фотка миябы">
        </div>
        <div class = "mt-5">
            <h2 class ="text-center mb-4">Создать пост</h2>
            <form action = "profile.php" id = "postForm" class = "d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
                <div class = "form-group">
                    <label class = "form-label" for = "postTitle">Название поста</label>
                    <input type = "text" name ="postTitle" class="form-control hacker-input" id  = "postTitle" placeholder="Введите название поста" required>
                </div>
                <div class = "form-group">
                    <label class = "form-label" for = "postTitle">Наполнение поста</label>
                    <textarea  name ="postContent" class="form-control hacker-input" id  = "postContent" placeholder="Наполните пост" rows ="5" required></textarea>
                </div> 
                <div class = "form-group">
                    <label class = "form-label" for = "postTitle">Загрузить файл</label>
                    <input type = "file" name ="file" class="form-control hacker-input" id  = "file">
                </div>
                <button class = "btn btn-primary" type = "submit" name = "submit">Сохранить пост</button> 
            </form>   
        </div>

   </div>
   <script src = "js/script.js"></script>
</body>
</html>
<?php
if (!isset($_COOKIE['User'])) {
    header("Location: /login.php");
    exit();
}

require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', '123', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['postTitle'];
    $main_text = $_POST['postContent'];

    if (!$title || !$main_text) die("no data post");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    if (!mysqli_query($link, $sql)) die("error insert data post");

    if (!empty($_FILES["file"])) {
        if (
            ((@$_FILES["file"]["type"] == "image/gif") ||
            (@$_FILES["file"]["type"] == "image/jpeg") ||
            (@$_FILES["file"]["type"] == "image/jpg") ||
            (@$_FILES["file"]["type"] == "image/pjpeg") ||
            (@$_FILES["file"]["type"] == "image/x-png") ||
            (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400)
        ) {
            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                "upload/" . $_FILES["file"]["name"]
            );
            echo "Load in: " . "upload/" . $_FILES["file"]["name"];
        } else {
            echo "upload failed!";
        }
    }
}
?>



