<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icons/favicon.ico">
    <link href="bootstrap 5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Steam Store</title>
</head>
<body class="store-background text-light">
    <nav class="navbar navbar-expand-lg navbar-dark store-menu">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="images/steam_logo.svg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <?php if (isset($_COOKIE["username"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="library.php">LIBRARY</a>
                    </li>
                    <?php } ?>
                    <?php if (!isset($_COOKIE["username"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">REGISTER</a>
                    </li>
                    <?php } ?>
                    <?php if (isset($_COOKIE["username"])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?logout">LOGOUT</a>
                    </li>
                    <?php } ?>
                </ul>
                <form class="d-flex" action="index.php">
                    <a href="cart.php" class="btn btn-success ps-3 pe-3 me-3">CART</a>
                    <input class="form-control me-2" type="search" placeholder="Search games" aria-label="Search" name="query" autocomplete="off">
                    <button class="btn btn-secondary" type="submit">
                        <img src="images/search.svg">
                    </button>
                </form>
            </div>
        </div>
    </nav>