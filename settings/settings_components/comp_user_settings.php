<div class="rounded-3 p-3 m-2 shadow" >
    <h1>Account settings</h1>
    <form method="post" class="mt-5" action="includes/register_action.php">
        <div class="row">

            <div class="col-md-6">
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



            </div>

            <div class="col-md-6">

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

                <!-- Submit button -->
                <input type="submit" id="submit_input" name="submit" value="Save" class="btn btn-dark btn-block mb-4">

            </div>

        </div>

    </form>
</div>

