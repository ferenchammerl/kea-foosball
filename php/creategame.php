<?php
require('classes/Game.php');
require('classes/Matchup.php');
require('classes/User.php');
$inputErr = 'Please fill in all the users';
if (!empty($_POST)) {
    // Ensure that the user fills out fields
    if (empty($_POST['win1'])) {
        die($inputErr);
    } else if (empty($_POST['win2'])) {
        die("Please enter a password.");
    } else if (empty($_POST['los1'])) {
        die("Please enter a password.");
    } else if (empty($_POST['los2'])) {
        die("Please enter a password.");
    }
}
$win1 = User::idByName($_POST['win1']);
$win2 = User::idByName($_POST['win2']);
$los1 = User::idByName($_POST['los1']);
$los2 = User::idByName($_POST['los2']);

if (is_null($win1) or is_null($win2) or is_null($los1) or is_null($los2))
    die('Bad Username');

else {
    $matchup = new Matchup($win1, $win2, $los1, $los2);
    $game = Game::withData('UNKNOWN', $matchup->matchup_id, null);
}
?>
