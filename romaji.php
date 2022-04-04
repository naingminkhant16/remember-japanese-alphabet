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
    <title>Romaji</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <h1 class="text-center text-light mt-5">Romaji</h1>
    <div class="container mt-3">
    <a href="index.php" class="text-decoration-none text-center text-light">
           <<- Back
        </a>
        <table class="table table-striped  table-hover table-bordered bg-light mt-3">
            <thead>
                <tr class="fs-2">
                    <th scope="col">#</th>
                    <th scope="col">a</th>
                    <th scope="col">i</th>
                    <th scope="col">u</th>
                    <th scope="col">e</th>
                    <th scope="col">o</th>
                </tr>
            </thead>
            <tbody class="fs-5">
                <tr>
                    <th scope="row">k</th>
                    <td>ka</td>
                    <td>ki</td>
                    <td>ku</td>
                    <td>ke</td>
                    <td>ko</td>
                </tr>
                <tr>
                    <th scope="row">s</th>
                    <td>sa</td>
                    <td>shi</td>
                    <td>su</td>
                    <td>se</td>
                    <td>so</td>
                </tr>
                <tr>
                    <th scope="row">t</th>
                    <td>ta</td>
                    <td>chi</td>
                    <td>tsu</td>
                    <td>te</td>
                    <td>to</td>
                </tr>
                <tr>
                    <th scope="row">n</th>
                    <td>na</td>
                    <td>ni</td>
                    <td>nu</td>
                    <td>ne</td>
                    <td>no</td>
                </tr>
                <tr>
                    <th scope="row">h</th>
                    <td>ha</td>
                    <td>hi</td>
                    <td>fu</td>
                    <td>he</td>
                    <td>ho</td>
                </tr>
                <tr>
                    <th scope="row">m</th>
                    <td>ma</td>
                    <td>mi</td>
                    <td>mu</td>
                    <td>me</td>
                    <td>mo</td>
                </tr>
                <tr>
                    <th scope="row">y</th>
                    <td>ya</td>
                    <td></td>
                    <td>yu</td>
                    <td></td>
                    <td>yo</td>
                </tr>
                <tr>
                    <th scope="row">r</th>
                    <td>ra</td>
                    <td>ri</td>
                    <td>ru</td>
                    <td>re</td>
                    <td>ro</td>
                </tr>
                <tr>
                    <th scope="row">w</th>
                    <td>wa</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>wo</td>
                </tr>
                <tr>
                    <th scope="row">* n</th>
                </tr>
            </tbody>
        </table>
       <!-- <div class="text-center mt-5">
       <a href="" class="text-decoration-none text-center fs-2 btn btn-lg btn-danger">
            Do Exercise
        </a>
       </div> -->
    </div>




    <footer class="p-3 text-center mt-5">
        <p class="text-light"> copy &copy; 2022, Created By Naing Min Khant</p>
    </footer>
</body>

</html>