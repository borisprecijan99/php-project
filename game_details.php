<?php include("header.php"); ?>

<?php
    require_once("db_utils.php");
    $db = new Database();
    $game = null;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $game = $db->getGameById($id);
    }
?>

<div class="container">
<?php
    if ($game != null)
        echo $game->getDetailsHtml();
?>
</div>

<?php include("footer.php"); ?>