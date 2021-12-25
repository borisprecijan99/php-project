<?php
    require_once("database/db_utils.php");
    $db = new Database();
    $query = "";
    if (isset($_GET["query"])) {
        $query = $_GET["query"];
    }
    if (isset($_GET["logout"])) {
        setcookie("id", "", time() - 1);
        setcookie("username", "", time() - 1);
        header("Location: index.php");
    }
    $games = $db->getAllGames($query);
?>

<?php include("templates/header.php"); ?>

<div class="container ps-3 pe-3 pb-3">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-10 justify">
            <h1 class="center mb-3">Catalog</h1>
        </div>
        <div class="col"></div>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php
            foreach ($games as $game) {
                echo $game->getHtml();
            }
        ?>
    </div>
</div>

<?php include("templates/footer.php"); ?>