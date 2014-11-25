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



}
?>