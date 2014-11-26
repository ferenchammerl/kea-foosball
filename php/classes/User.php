<?php

/**
 * Created by PhpStorm.
 * User: Ferenc
 * Date: 11/25/2014
 * Time: 11:39 AM
 */
class User
{

    public $user_id = -1;
    public $username = 0;
    public $password = '';
    public $salt = '';
    public $email = '';
    public $isHomen = false;
    public $elo = 1000;


    function full_construct($elo, $email, $isHomen, $password, $salt, $user_id, $username)
    {
        $this->elo = $elo;
        $this->email = $email;
        $this->isHomen = $isHomen;
        $this->password = $password;
        $this->salt = $salt;
        $this->user_id = $user_id;
        $this->username = $username;
    }

    function __construct($user_id)
    {
        $this->user_id = $user_id;
        User::fetchFromDB();
    }

    public function fetchFromDB()
    {
        require("config.php");
        $query = "SELECT * FROM users WHERE user_ID = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('i', $this->user_id);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($uID, $un, $pw, $sa, $em, $isHom, $el);;


            echo "Username: $un\r\n";
            while ($stmt->fetch()) {
                $this->user_id = $uID;
                $this->username = $un;
                $this->password = $pw;
                $this->salt = $sa;
                $this->email = $em;
                $this->isHomen = $isHom;
                $this->elo = $el;
            }

        } else {
            $_SESSION['loginfailure'] = true;
        }

        $stmt->close();
    }

    public function getLatestGames($count)
    {
        require("../config.php");


        $query = "SELECT *
FROM games
WHERE(
    1 in    (SELECT WIN1     FROM matchups    ) OR
    1 in    (SELECT WIN2     FROM matchups    ) OR
    1 in    (SELECT LOS1     FROM matchups    ) OR
    1 in    (SELECT LOS2     FROM matchups    )
    );";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('iiii', $user_id, $user_id, $user_id, $user_id);

            $stmt->execute();


            $id = -1;
            $stmt->bind_result($id);

            $match_ID_array = array();
            /* fetch values */
            while ($stmt->fetch()) {
                $match_ID_array[] = $id;
            }

            /* close statement */
            $stmt->close();
            return $match_ID_array;
        } else die('database error');
    }

    public function letitout()
    {
        echo "$this->user_id, $this->username, $this->password, $this->salt, $this->email, $this->isHomen, $this->elo";
    }

    //STATIC FUNCTIONS


    public static function AttemptLogin($username, $password)
    {
        User::checkUsername($username);
        require("config.php");
        $query = "SELECT user_id, username FROM users WHERE username = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('s', $username);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($dbuserid, $dbusername);


            /* fetch values */
            $stmt->fetch();


            if ($dbusername != $username) die('Incorrect username');

            $user = new User($dbuserid);
            if (User::saltedPW($password, $user->salt) == $user->password) {
            
                $_SESSION['username'] = $_POST['username'];
                return $user;
            } else die('Incorrect password');

        }
    }

    public static function AttemptRegister($username, $password, $email)
    {
        User::checkIfUsername($username);
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = User::saltedPW($password, $salt);
        User::insertUser($username, $password, $salt, $email);

    }

    public static function saltedPW($password, $salt)
    {

        $password = hash('sha256', $password . $salt);
        for ($round = 0; $round < 65536; $round++) {
            $password = hash('sha256', $password . $salt);
        }
        return $password;

    }

    public static function idByName($username)
    {

        require("config.php");
        $user_id = -2;
        $query = "SELECT user_id FROM users WHERE USERNAME = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('s', $username);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($user_id);

            $stmt->fetch();


        } else {
            die('dberror');
        }

        $stmt->close();
        return $user_id;
    }

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

    public static function fetchPassword($username, &$salt, &$dbpassword)
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

    public static function checkIfUsername($username)
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

        $stmt->bind_param('ssss', $username, $password, $salt, $email);

        $un = $mysqli->real_escape_string($username);
        $pw = $mysqli->real_escape_string($password);
        $sa = $mysqli->real_escape_string($salt);
        $em = $mysqli->real_escape_string($email);

        /* execute prepared statement */
        $stmt->execute();
        $stmt->close();
    }

}