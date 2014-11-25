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

   // require_once('classes/User.php');
    User::AttemptRegister($_POST['username'], $_POST['password'], $_POST['email']);



    User::checkIfUsername($username);


    // Security measures
    $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
    $password = hash('sha256',  . $salt);
    for ($round = 0; $round < 65536; $round++) {
        $password = hash('sha256', $password . $salt);
    }


    User::insertUser($username, $password, $salt, $email);

    printf("%d Row inserted.\n", $stmt->affected_rows);


    header("Location: ../index.php");
    die("Redirecting to index.php");
}
?>