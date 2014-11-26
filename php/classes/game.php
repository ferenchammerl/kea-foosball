<?php

class Game
{
//CREATE TABLE games
//(
//ID int NOT NULL AUTO_INCREMENT,
//LOCATION varchar(255)  DEFAULT 'Unknown',
//MATCHUPID int NOT NULL,
//PRIMARY KEY (ID)
//);

    public $game_id;
    public $location;
    public $matchup_id;
    public $date;

    function __construct()
    {
    }

    public static function withID($game_id)
    {
        $instance = new self();
        $instance->loadByID($game_id);
        return $instance;


    }

    protected function loadByID($game_id)
    {

        $this->game_id = $game_id;
        require("../config.php");

        $location = 'DatabaseError';
        $query = "SELECT location, matchupid FROM games WHERE id = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('i', $game_id);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($location, $matchup);


            while ($stmt->fetch()) {
                $this->$location = $location;
                $this->$matchup_id = $matchup;
            }
        }
    }

    public static function withData($location, $matchup, $date)
    {
        $instance = new self();
        $instance->fill($location, $matchup, $date);
        $instance->insert();
        return $instance;
    }

    protected function fill($location, $matchup, $date)
    {
        $this->game_id = -1;
        $this->location = $location;
        $this->matchup_id = $matchup;
        $this->date = $date;
    }

    protected function save()
    {

    }

    protected function insert()
    {
        require("config.php");
        $stmt = $mysqli->prepare("INSERT INTO games (location,matchup_id) VALUES (?,?)");

        echo $this->matchup_id;

        $stmt->bind_param('si', $this->location, $this->matchup_id);


        /* execute prepared statement */
        $stmt->execute();
        $this->game_id = $mysqli->insert_id;
        $stmt->close();
    }

    public static function latestGame()
    {
        require("../config.php");

        $location = 'DatabaseError';
        $query = "SELECT location, matchupid FROM games COUNT = 1";


        if ($stmt = $mysqli->prepare($query)) {

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($location, $matchup_id);


            $stmt->fetch();
            return
        }
        $stmt->close();

    }

}

?>