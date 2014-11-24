<?php


class login
{
    public static function checkUsername($username)
    {

        require("config.php");
        $query = "SELECT username FROM users WHERE USERNAME = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('s', $_POST['username']);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($username);


            while ($stmt->fetch()) {
                if ($username != $_POST['username']) die('Incorrect username');
            }

        } else {
            $_SESSION['loginfailure'] = true;
        }

        $stmt->close();

    }

    public static function fetchPassword($username,&$salt,&$dbpassword)
    {

        require("config.php");
        $query = "SELECT salt, password FROM users WHERE USERNAME = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('s', $username);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($salt, $dbpassword);
            $stmt->fetch();

        } else die("Password fetch failed");

        $stmt->close();
    }
}