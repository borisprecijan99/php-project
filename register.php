<?php
    require_once("database/db_utils.php");
    $db = new Database();
    $error = false;
    if (isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["username"]) && isset($_POST["password"])) {
        $firstName = htmlspecialchars($_POST["firstName"]);
        $lastName = htmlspecialchars($_POST["lastName"]);
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            if (str_starts_with($_FILES["image"]["type"], "image/")) {
                $imagePath = "images/" . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
                $ok = $db->register($firstName, $lastName, $username, $password, $imagePath);
            } else {
                $ok = false;
            }
        } else {
            switch($_FILES["image"]["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    $ok = false;
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $ok = $db->register($firstName, $lastName, $username, $password, null);
            }
        }
        if ($ok) {
            header("Location: index.php");
        } else {
            $error = true;
        }
    }
?>

<?php include("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-xxl-2 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-7">
            <h1 class="center">Register</h1>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000">
                <?php if ($error) { ?>
                <div class="mb-3 alert alert-danger">
                    Username already exists or problem with image upload
                </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label" for="firstName">First name</label>
                    <input class="form-control" id="firstName" autocomplete="off" type="text" name="firstName" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="lastName">Last name</label>
                    <input class="form-control" id="lastName" autocomplete="off" type="text" name="lastName" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" autocomplete="off" type="text" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Image</label>
                    <input class="form-control" id="image" type="file" accept="image/*" name="image">
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include("templates/footer.php"); ?>