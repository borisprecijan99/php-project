<?php
    require_once("database/db_utils.php");
    $db = new Database();
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $id = $db->login($username, $password);
        if ($id != 0) {
            setcookie("id", $id, time() + 365 * 24 * 60 * 60);
            setcookie("username", $username, time() + 365 * 24 * 60 * 60);
            header("Location: index.php");
        }
    }
?>

<?php include("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-xxl-2 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-7">
            <h1 class="center">Login</h1>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" autocomplete="off" type="text" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include("templates/footer.php"); ?>