<?php
require_once "config/functions.php";
require_once "config/DB.php";
$db = new DB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiragana</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        @media only screen and (max-width: 528px) {
            .hira {
                width: 300px;
            }
        }
    </style>
</head>

<body>
    <h1 class="text-center text-light mt-5">Hiragana</h1>
    <div class="container mt-3">
        <a href="index.php" class="text-decoration-none text-center text-light">
            <<- Back </a><br>
                <div class="text-center mt-5">
                    <img class="hira" src="images/hiragana.png" alt="hiragana">
                </div>
             
                <div class="text-center mt-5">
                    <a href="exercise.php?n_id=2" class="text-decoration-none text-center fs-2 btn btn-md-lg btn-danger">
                        Do Exercise
                    </a>
                </div>
    </div>




    <footer class="p-3 text-center mt-5">
        <p class="text-light"> copy &copy; 2022, Created By Naing Min Khant</p>
    </footer>
</body>

</html>