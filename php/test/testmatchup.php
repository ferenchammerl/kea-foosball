<?php
/**
 * Created by PhpStorm.
 * User: Ferenc
 * Date: 11/26/2014
 * Time: 4:37 AM
 */

require("config.php");
require("../classes/Matchup.php");

//INSERTION

$win1 = 1;
$win2 = 2;
$los1 = 3;
$los2 = 4;
//matchup constructor
echo 'matchup cons';
new Matchup($win1, $win2, $los1, $los2);

