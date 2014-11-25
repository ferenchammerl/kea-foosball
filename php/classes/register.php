<?php

/**
 * Created by PhpStorm.
 * User: Ferenc
 * Date: 11/25/2014
 * Time: 12:36 AM
 */
class register
{
    public static function checkUsername($username)
    {

        require("config.php");
        $query = "SELECT username  FROM Users WHERE username = ?";


        if ($stmt = $mysqli->prepare($query)) {

            $stmt->bind_param('s', $_POST['username']);
            /* execute statement */
            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($username);

            /* fetch values */    /* fetch values */
            while ($stmt->fetch()) {
                die('Username exists');
            }

            /* close statement */
        }
        $stmt->close();

    }

    public static function insertUser($username, $password, $salt, $email)
    {
        require("config.php");
        $stmt = $mysqli->prepare("INSERT INTO users (username,password,salt,email) VALUES (?,?,?,?)");

        $stmt->bind_param('ssss', $un, $pw, $sa, $em);

        $un = $mysqli->real_escape_string($username);
        $pw = $mysqli->real_escape_string($password);
        $sa = $mysqli->real_escape_string($salt);
        $em = $mysqli->real_escape_string($email);

        /* execute prepared statement */
        $stmt->execute();
        $stmt->close();
    }
} 