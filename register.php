<?php include("header.php"); ?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="mt-5 col-xxl-2 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-7">
            <h1 class="center">Register</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label" for="first_name">First name</label>
                    <input class="form-control" id="first_name" type="text" name="first_name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="last_name">Last name</label>
                    <input class="form-control" id="last_name" type="text" name="last_name">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="password" name="password">
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