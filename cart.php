<?php
    require_once("database/db_utils.php");
    session_start();
    $db = new Database();
?>

<?php include("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-10">
            <h1 class="center mb-3">Cart</h1>
            <?php if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) { ?>
            <h6 class="center">Cart is empty</h6><!--videti za tekst i velicinu-->
            <?php } else { ?>
            <table class="table align-middle text-reset">
                <?php
                    foreach ($_SESSION["cart"] as $id) {
                        $game = $db->getGameById($id);
                        echo $game->getHtmlForCartPage();
                    }
                ?>
            </table>
            <div class="center">
                <div class="center p-2 add-to-cart-button">
                    <?php if (!isset($_COOKIE["username"])) { ?>
                    <a href="login.php" class="btn btn-success ps-4 pe-4">Login</a>
                    <?php } ?>
                    <?php if (isset($_COOKIE["username"])) { ?>
                    <a href="index.php?buy" class="btn btn-success ps-4 pe-4">Buy</a>
                    <?php } ?>
                    <a href="index.php?remove-all" class="btn btn-success ps-4 pe-4">Remove All</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include("templates/footer.php"); ?>