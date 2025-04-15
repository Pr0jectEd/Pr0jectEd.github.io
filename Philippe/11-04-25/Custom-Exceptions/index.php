<?php
require_once 'DiceGame.php';

$game = new DiceGame("conf.ini");
$game->rollUntilSix();
?>
