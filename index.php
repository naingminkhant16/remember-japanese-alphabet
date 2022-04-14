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
    <title>Home</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <div class="bg pt-3 p-sm-5">
        <div class="container">
            <h1 class="text-center text-light">Remember Japanese Alphabet</h1>
            <div class="row mt-0 mt-md-5 g-3">
                <div class="hv col-sm-4">
                    <a href="romaji.php" class="text-light text-decoration-none">
                        <div class="bg-danger rounded text-center fs-2 p-5">Romaji</div>
                    </a>
                </div>
                <div class="hv col-sm-4">
                    <a href="hiragana.php" class="text-light text-decoration-none">
                        <div class="bg-warning rounded text-center fs-2 p-5">Hiragana</div>
                    </a>
                </div>
                <div class="hv col-sm-4">
                    <a href="#" class="text-light text-decoration-none">
                        <div class="bg-info rounded text-center fs-2 p-5">Katakana</div>
                    </a>
                </div>

            </div>

        </div>

        <?php $roma = $db->crud("SELECT * FROM nihongo", null, null, true);
        foreach ($roma as $char) :
        ?>
            <div class="container mt-5 text-light" style="max-width: 800px;">
                <div class="p-5 bg-primary">
                    <h3><?= $char->name ?></h3>
                    <hr>
                    <p>
                        <?= $char->description ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
        <footer class="p-3 text-center mt-5">
            <p class="text-light"> copy &copy; 2022, Created By Naing Min Khant</p>
        </footer>
    </div>
</body>

</html>