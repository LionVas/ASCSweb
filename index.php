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
    <div class = "container d-flex justify-content-center align-items-center vh-100">
        <div class = "row">
            <div class = "col-12 text-center">
                <h1 class = "mb-4">Login In!</h1>
                <?php 
                    if(!isset($_COOKIE['User'])){    
                ?>
                <div class="d-flex justify-content-center gap-3">
                    <a href="registration.php" class = "btn btn-primary">Registration</a>
                    <a href = "login.php" class = "btn btn-primary">Login</a>
                </div>
                <?php
                    } else {
                        $link = mysqli_connect('127.0.0.1', 'root', '123', 'first');
                        $sql = "SELECT * FROM posts";
                        $res = mysqli_query($link, $sql);
                        if (mysqli_num_rows($res)>0){
                            while($post = mysqli_fetch_array($res)){
                                echo "<a href = '/posts.php?id=" . $post["id"] . "'>" . $post["title"]. "</a><br>";
                            }
                        } else {
                            echo("No posts");
                        }
                    }
                    ?>
            </div>
        </div>

    </div>
</body>
</html>