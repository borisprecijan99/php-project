<?php
    require_once("database/db_utils.php");
    $db = new Database();
    $id = $_COOKIE["id"];
    $games = $db->getAllGamesByUserId($id);
?>

<?php include("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-10">
            <h1 class="center mb-3">Library</h1>
            <table class="table align-middle text-reset">
                <?php
                    foreach ($games as $game) {
                        echo $game->testHtml();
                    }
                ?>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include("templates/footer.php"); ?>