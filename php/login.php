<?php
session_start();
require('classes/User.php');

if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['username'])) {
        die("Please enter a username.");
    } else if (empty($_POST['password'])) {
        die("Please enter a password.");
    }

    $_SESSION['user']  =User::AttemptLogin( $_POST['username'],  $_POST['password']);
    if(isset($_SESSION['user'])) header("Location: creatematch.php"); else 'bg report';



//
//
//    $username = $_POST['username'];
//
//    User::checkUsername($username);
//    $salt = '';
//    $dbpassword = '';
//    User::fetchPassword($username, $salt, $dbpassword);
//
//
//    $password = $_POST['password'];
//    $password = hash('sha256', $password . $salt);
//    for ($round = 0; $round < 65536; $round++) {
//        $password = hash('sha256', $password . $salt);
//    }
//
//
//    if ($password == $dbpassword) {
//        $_SESSION['username'] = $username;
//        echo 'You are now logged in';
//        $_SESSION['Title'] = 'Welcome, ' . $username;
//        unset($_SESSION['loginfailure']);
//        header("Location: mymatches.php");
//    } else {
//        $_SESSION['loginfailure'] = true;
//        header("Location: ../index.php");
//
//    }
}
?>