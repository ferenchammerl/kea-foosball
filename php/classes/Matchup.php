<?php

class Matchup
{
    public $matchup_id;
    public $win1;
    public $win2;
    public $los1;
    public $los2;

    public $winc1;
    public $winc2;
    public $losc1;
    public $losc2;

    function __construct($win1, $win2, $los1, $los2)
    {
        $this->win1 = $win1;
        $this->win2 = $win2;
        $this->los1 = $los1;
        $this->los2 = $los2;
        $winc1 = 0;
        $winc2 = 0;
        $losc1 = 0;
        $losc2 = 0;
        $this::insert();
    }

    protected function insert()
    {
        require("config.php");
        $stmt = $mysqli->prepare("INSERT INTO matchups (win1,win2,los1,los2) VALUES (?,?,?,?)");

        $stmt->bind_param('iiii', $this->win1, $this->win2, $this->los1, $this->los2);



        /* execute prepared statement */
        $stmt->execute();

        printf("Affected rows (INSERT): %d\n", $mysqli->affected_rows);
        $this->matchup_id=$mysqli->insert_id;
        echo 'Matchup inserted at '. $this->matchup_id.'    ';
        $stmt->close();
    }



    public function save()
    {

        require("config.php");
        $stmt = $mysqli->prepare("UPDATE matchups SET WIN1=?,WIN2=?,LOS1=?,LOS2=?, WIN1CON=?, WIN2CON=?, LOS1CON=?, LOS2CON=? WHERE matchup_id=?");

        $stmt->bind_param('iiiiiiiii', $win1, $win2, $los1, $los2, $winc1, $winc2, $losc1, $losc2, $matchup_id);


        /* execute prepared statement */
        $stmt->execute();
        $stmt->close();

    }

}