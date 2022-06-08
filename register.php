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


    <?php session_start();
    require("header.php"); ?>

    <main>
        <div class="row justify-content-center mx-3">
            <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 bg-light p-3 shadow">
                <h1>Register</h1>
                <form method="post" class="mt-5" action="includes/register_action.php">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email_input" name="email" class="form-control" />
                        <label class="form-label" for="email_input">Email address</label>

                        <?php if (isset($_SESSION['e_email'])) {
                            echo '<div class="text-danger">' . $_SESSION['e_email'] . '</div>';
                            unset($_SESSION['e_email']);
                        }  ?>

                    </div>

                    <!-- Login input -->
                    <div class="form-outline mb-4">
                        <input type="name" id="login_input" name="login" class="form-control" />
                        <label class="form-label" for="login_input">Login</label>

                        <?php if (isset($_SESSION['e_login'])) {
                            echo '<div class="text-danger">' . $_SESSION['e_login'] . '</div>';
                            unset($_SESSION['e_login']);
                        }  ?>

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="pass_input" name="pass" class="form-control" />
                        <label class="form-label" for="pass_input">Password</label>
                        <?php if (isset($_SESSION['e_pass'])) {
                            echo '<div class="text-danger">' . $_SESSION['e_pass'] . '</div>';
                            unset($_SESSION['e_pass']);
                        }  ?>

                    </div>

                    <!-- Re-Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="repass_input" name="repass" class="form-control" />
                        <label class="form-label" for="repass_input">Confirm password</label>
                    </div>

                    <!-- Terms of Policy -->
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input custom-checkbox" type="checkbox" value="" id="terms_input" name="terms" />
                                <label class="form-check-label" for="form2Example31"> Accept </label>
                                <a href="#!">terms of policy</a>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['e_terms'])) {
                                    echo '<div class="text-danger d-flex  justify-content-center">' . $_SESSION['e_terms'] . '</div>';
                                    unset($_SESSION['e_terms']);
                                }  ?>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" id="submit_input" name="submit" value="Register" class="btn btn-dark btn-block mb-4">

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already registered? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
    </main>

    <?php require("footer.php"); ?>