<?php require_once "header.php" ?>
<?php

if (!empty($_POST)) {

    //check empty input fields
    (!isEmptyInput($_POST)) ? $noErr=true : $err = isEmptyInput($_POST);
    if ($noErr && empty($err)) {
        $name = $_POST['name'];
        $symbol = $_FILES['symbol']['name'];
        $nihongo = $_POST['nihongo'];

        //image input filed
        if ($_FILES['symbol']['error'] == 0) {

            $path = "../images/chars/" . $_FILES['symbol']['name'];
            $imageType = pathinfo($path, PATHINFO_EXTENSION);

            if ($imageType != 'jpg' && $imageType != 'jpeg' && $imageType != 'png') {
                echo "<script>alert('Invlaid image type');window.location.href='add-char.php'</script>";
                die();
            }
            //img type check success and start do query
            $query = "INSERT INTO characters(name,symbol,nihongo_id) VALUES (:name,:symbol,:nihongo_id)";
            $data = [
                ":name" => $name,
                ":symbol" => $symbol,
                ":nihongo_id" => $nihongo
            ];
            $result = $db->crud($query, $data);
            // move_uploaded_file($_FILES['symbol']['tmp_name'], $path);
            if ($result) {
                echo "<script>alert('Successfully Created Character.');window.location.href='index.php'</script>";
            }
        } else {
            $uiErr['symbol'] = "Symbol is required!";
        }
    } else {
        //found empty input fileds and make ui error message
        $findErrArr = ['name', "nihongo_id", "symbol"];
        $err = explode(',', $err);

        $uiErr = [];
        foreach ($findErrArr as $findErr) {
            if (in_array($findErr, $err)) {
                $uiErr[$findErr] = $findErr . " is required!";
            }
        }
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Character</h1>
</div>

<form action="" method="POST" style="max-width: 500px;" class="container mt-4" enctype="multipart/form-data">
    <?php if (isset($catNameDuplicatedErr)) : ?>
        <div class="alert alert-warning">
            <i class="fa-solid fa-triangle-exclamation pe-2"></i>
            <?= $catNameDuplicatedErr ?>
        </div>
    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">Name :</label>
        <p style="color:#EF1510"><?= isset($uiErr['name']) ? '*' . $uiErr['name'] : '' ?></p>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Nihongo :</label>
        <p style="color:#EF1510"><?= isset($uiErr['nihongo']) ? '*' . $uiErr['nihongo'] : '' ?></p>
        <select class="form-select" name="nihongo">

            <?php       
            $cats = $db->crud("SELECT * FROM nihongo", null, null, true);

            foreach ($cats as $cat) :
            ?>
                <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
            <?php endforeach; ?>

        </select>
    </div>
    <div class="mb-4">
        <label class="form-label">Symbol :</label>
        <p style="color:#EF1510"><?= isset($uiErr['symbol']) ? '*' . $uiErr['symbol'] : '' ?></p>
        <input type="file" name="symbol" class="form-control">
    </div>
   

    <div class="mb-3">
        <button class="btn btn-outline-dark w-100" type="submit">Create</button>
    </div>
</form>

<?php require_once "footer.php" ?>