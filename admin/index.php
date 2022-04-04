<?php require "header.php" ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2"> Dashboard</h1>
  <div class="d-flex">
    <?php
    $chars = $db->crud("SELECT * FROM nihongo", null, null, true);
    foreach ($chars as $char) :
    ?>
      <a href="index.php?n_id=<?= $char->id ?>" class="me-3 p-2 text-decoration-none text-light badge bg-dark rounded-pill"><?= $char->name ?></a>
    <?php endforeach; ?>
  </div>
</div>
<div class="container">
  <div class="row row-cols-2 row-cols-md-5 g-3">
    <?php

    if (!empty($_POST['search'])) {

      $searchKey = $_POST['search'];
      $characters = $db->crud("SELECT * FROM characters WHERE name LIKE '%$searchKey%'", null, null, true);
    } elseif (!empty($_GET['n_id'])) {
      $n_id = $_GET['n_id'];
      $characters = $db->crud("SELECT * FROM characters WHERE nihongo_id=:n_id", [':n_id' => $n_id], null, true);
    } else {
      $characters = $db->crud("SELECT * FROM characters", null, null, true);
    }
    if ($characters) :
      foreach ($characters as $char) :
    ?>
        <div class="col">
          <div class="card" style="max-width: 200px;">
            <div class="card-body">
              <img src="../images/chars/<?= $char->symbol ?>" class="card-img-top">
              <span class="badge bg-danger p-1" style="font-size: 12px;">
                <?php 
                $nihongo_name=$db->crud("SELECT * FROM nihongo WHERE id=:id",[':id'=>$char->nihongo_id],true);
                echo $nihongo_name->name;
                ?>
              </span>
              <h2 class="card-title">
                <?= $char->name ?>
              </h2>
            </div>
          </div>
        </div>
    <?php
      endforeach;
    endif;
    ?>
  </div>
</div>
<?php require "footer.php" ?>