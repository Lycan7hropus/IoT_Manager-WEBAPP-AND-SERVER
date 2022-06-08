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


<?php require("header.php"); ?>

<main>
    <div class="row justify-content-center mx-3">
        <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3 bg-light p-3 shadow">
            <h1>Register</h1>
            <form class="mt-5">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Email address</label>
                </div>

                <!-- Login input -->
                <div class="form-outline mb-4">
                    <input type="name" id="form2ExampleName" class="form-control" />
                    <label class="form-label" for="form2ExampleName">Login</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- Re-Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Confirm password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input custom-checkbox" type="checkbox" value="" id="form2Example31" checked />
                            <label class="form-check-label" for="form2Example31"> Accept </label>
                            <a href="#!">terms of policy</a>
                        </div>
                    </div>

                </div>

                <!-- Submit button -->
                <button type="button" class="btn btn-dark btn-block mb-4">Register</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Already registered? <a href="login.php">Login</a></p>


                </div>
        </div>
</main>

<?php require("footer.php"); ?>