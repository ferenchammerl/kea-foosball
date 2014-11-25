<?php
session_start();
require('classes/login.php');

if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['username'])) {
        die("Please enter a username.");
    } else if (empty($_POST['password'])) {
        die("Please enter a password.");
    }

    $username = $_POST['username'];

    login::checkUsername($username);
    $salt = '';
    $dbpassword = '';
    login::fetchPassword($username, $salt, $dbpassword);


    $password = $_POST['password'];
    $password = hash('sha256', $password . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }


    if ($password == $dbpassword) {
        $_SESSION['username'] = $username;
        echo 'You are now logged in';
        $_SESSION['Title'] = 'Welcome, ' . $username;
        unset($_SESSION['loginfailure']);
        header("Location: mymatches.php");
    } else {
        $_SESSION['loginfailure'] = true;
        header("Location: ../index.php");

    }
}
?>