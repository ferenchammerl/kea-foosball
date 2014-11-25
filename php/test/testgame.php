<?php
require('../config.php');
require('../classes/game.php');

$match = new Game(1);
$loc = $match->location;
echo $loc . ' <---- this location';

?>