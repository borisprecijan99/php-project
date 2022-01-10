<?php
    require_once("database/db_utils.php");
    session_start();
    $db = new Database();
    $query = "";
    $games = null;

    if (isset($_GET["remove-all"])) {
        session_destroy();
        header("Location: index.php");
    }
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    if (isset($_GET["query"])) {
        $query = htmlspecialchars($_GET["query"]);
    }

    if (isset($_COOKIE["id"])) {
        $id = $_COOKIE["id"];
        if (isset($_GET["buy"])) {
            $inCart = $_SESSION["cart"];
            $db->addAllGamesToLibrary($inCart, $id);
            session_destroy();
            header("Location: index.php");
        }
        if (isset($_GET["logout"])) {
            setcookie("id", "", time() - 1);
            setcookie("username", "", time() - 1);
            header("Location: index.php");
        }
        $games = $db->getAllGamesUserLoggedIn($query, $id);
    } else {
        $games = $db->getAllGamesUserNotLoggedIn($query);
    }

    foreach ($games as $game) {
        if ($game->getStatus() != "IN LIBRARY") {
            if (isset($_SESSION["cart"][$game->getId()])) {
                $game->setStatus("IN CART");
            } else {
                $game->setStatus("NOT IN CART");
            }
        } else {
            if (isset($_SESSION["cart"][$game->getId()])) {
                unset($_SESSION["cart"][$game->getId()]);
            }
        }
    }
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
                echo $game->getHtmlForHomePage();
            }
        ?>
    </div>
</div>

<?php include("templates/footer.php"); ?>