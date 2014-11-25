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

    public $id;
    public $location;
    public $matchup;


    function __construct($id)
    {
        $this->id = $id;
        require("../config.php");

        $location = 'DatabaseError';
        $matchup = 0;
        $query = "SELECT location, matchupid FROM games WHERE id = ?";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('i', $id);

            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($location, $matchup);


            while ($stmt->fetch()) {
                $this->$location = $location;
                $this->$matchup = $matchup;
            }
        }
        echo $location;
        echo $matchup;


    }

    function __constructNew($id, $location, $matchup)
    {
        $this->id = $id;
        $this->location = $location;
        $this->matchup = $matchup;
    }


}

?>