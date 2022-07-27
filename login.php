<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in']) {
        echo "you are logged in.. " . $_SESSION['user_login'];
        header('Location: main.php');
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>


    <?php
    require("components/header.php");
    ?>


    <div class="content">
        <main>
        <div style="height: 50px;">xxx</div>
            <div class="row justify-content-center w-100" id="row_login_page_01">
            
                <div class="col-6 ">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h1 class="mt-5 mb-3 text-center ">Check our android app</h1>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6"><img src="img/smartphone-g3fbe85d98_1280.png" alt="" class="  img-fluid pb-5"></div>
                    </div>


                </div>

                <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 bg-light p-3 shadow">
                    <h1>Login</h1>

                    <form method="post" class="mt-5" action="includes/login_action.php">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="login_input" name="login" class="form-control" />
                            <label class="form-label" for="email">Login</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="pass_input" name="pass" class="form-control" />
                            <label class="form-label" for="pass">Password</label>
                        </div>

                        <!-- Submit button -->
                        <input type="submit" id="submit_input" name="submit" value="Sign in" class="btn btn-dark btn-block mb-4">

                        <!-- Register -->
                        <div class="text-center">
                            <p>Not a member? <a href="register.php">Register</a></p>
                        </div>

                    </form>
                </div>


        </main>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
<?php require("components/footer.php"); ?>

</html>