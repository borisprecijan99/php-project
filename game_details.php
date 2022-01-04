<?php
    require_once("database/db_utils.php");
    session_start();
    $db = new Database();
    $game = null;
    if (isset($_POST["id"]) && isset($_POST["status"])) {
        $id = $_POST["id"];
        $status = $_POST["status"];
        $game = $db->getGameById($id);
        if (isset($_POST["add"])) {
            $_SESSION["cart"][$game->getId()] = $game->getId();
            header("Location: index.php");
        } else {
            $game->setStatus($status);
        }
    }
?>

<?php include("templates/header.php"); ?>

<div class="container">
    <?php
        if ($game != null)
            echo $game->getHtmlForGameDetailsPage();
    ?>
</div>

<?php include("templates/footer.php"); ?>