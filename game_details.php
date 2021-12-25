<?php
    require_once("database/db_utils.php");
    $db = new Database();
    $game = null;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $game = $db->getGameById($id);
    }
    if (isset($_POST["id"])) {
        echo $_POST["id"];
    }
?>

<?php include("templates/header.php"); ?>

<div class="container">
<?php
    if ($game != null)
        echo $game->getDetailsHtml();
?>
</div>

<?php include("templates/footer.php"); ?>