<?php include("header.php"); ?>

<?php
    require_once("db_utils.php");
    $db = new Database();
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $db->register($_POST["firstName"], $_POST["lastName"], $_POST["username"], $_POST["password"], "");
    }
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-xxl-2 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-7">
            <h1 class="center">Register</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label" for="firstName">First name</label>
                    <input class="form-control" id="firstName" autocomplete="off" type="text" name="firstName">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="lastName">Last name</label>
                    <input class="form-control" id="lastName" autocomplete="off" type="text" name="lastName">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" autocomplete="off" type="text" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="imagePath">Image</label>
                    <input class="form-control" id="imagePath" type="file" name="imagePath">
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include("footer.php"); ?>