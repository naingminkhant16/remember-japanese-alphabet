<?php
require_once "config/functions.php";
require_once "config/DB.php";
$db = new DB();
if (empty($_GET["n_id"])) {
    header("Location: index.php");
}
if (!empty($_POST)) {
    $q_id = $_POST['q_id'];
    $answer = $_POST['answer'];

    $q_name = $db->crud("SELECT * FROM characters WHERE id=:id", [':id' => $q_id], true);

    if ($q_name->name == $answer) {
        $correct = true;
    } else {
        $fail = true;
    }

    $ramdonChar = false;
} else {
    $ramdonChar = true;
}

$n_id = $_GET['n_id'];
$chars = $db->crud("SELECT * FROM characters WHERE nihongo_id=:n_id", [':n_id' => $n_id], null, true);

($ramdonChar) ?
    $q = $chars[rand(0, 45)]
    : $q = $chars[$q_id - 1];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css">
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>

<body>
    <h1 class="text-center text-light mt-5">Hiragana Exercise</h1>

    <div class="container mt-3">
        <a href="index.php" class="text-decoration-none text-center text-light">
            <<- Back </a>
    </div>
    <div class="text-center container mt-4">
        <span class="bg-warning p-2 rounded"><i class="fa-solid fa-triangle-exclamation pe-2"></i>Answer With Romaji</span>
    </div>
    <div class="bg-light rounded text-center container mt-5" style="width: 300px;">
        <img src="images/chars/<?= $q->symbol ?>" width="200px" alt="">
    </div>
    <div class="mt-5">
        <?php if (isset($correct)) : ?>
            <div class="alert alert-success container p-3" style="max-width: 300px;">
                <i class="fa-solid fa-check text-success"></i> Correct
            </div>
            <div class="text-center">
                <a href="exercise.php?n_id=<?= $n_id ?>" class="btn btn-success">Next</a>
            </div>
        <?php endif; ?>
        <?php if (isset($fail)) : ?>
            <div class="alert alert-danger container" style="max-width: 300px;">
                <i class="fa-solid fa-xmark text-danger"></i> Incorrect. Try again!
            </div>
        <?php endif; ?>
        <?php if (empty($correct)) : ?>
            <form action="" method="POST" class="container mt-3" style="max-width: 200px;">
                <input type="hidden" name="q_id" value="<?= $q->id ?>">
                <div class="mb-3">
                    <input type="text" name="answer" class="form-control" placeholder="Your answer here...">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-md-lg btn-primary">CHECK</button>
                </div>
            </form>
        <?php endif; ?>
    </div>


    <footer class="p-3 text-center mt-5">
        <p class="text-light"> copy &copy; 2022, Created By Naing Min Khant</p>
    </footer>
</body>

</html>