<?php
require("config.php");
if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['username'])) {
        die("Please enter a username.");
    }
    if (empty($_POST['password'])) {
        die("Please enter a password.");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid E-Mail Address");
    }

    require_once('classes/User.php');
    User::AttemptRegister($_POST['username'], $_POST['password'], $_POST['email']);


    header("Location: ../index.php");
    die("Redirecting to index.php");
}
?>