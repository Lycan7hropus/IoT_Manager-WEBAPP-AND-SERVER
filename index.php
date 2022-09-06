<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in']) {
        echo "you are logged in.. " . $_SESSION['user_login'];
        header('Location: main.php');
        exit();
    }
}

header('Location: login.php');

?>