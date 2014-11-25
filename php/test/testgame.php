<?php
require('../config.php');
require('../classes/Game.php');

$match = new Game(1);
$loc = $match->location;
echo $loc . ' <---- this location';

?>