<?php

require __DIR__ . '/vendor/autoload.php';

use GameOfThree\Controller\GameController;

$game = new GameController();
echo $game->play();
