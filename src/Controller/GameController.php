<?php

namespace GameOfThree\Controller;

use GameOfThree\Entity\Game;
use GameOfThree\Entity\GameNumber;
use GameOfThree\Entity\Player;
use GameOfThree\Service\GameService;

class GameController
{
	private $gameService;

	public function __construct()
	{
		$this->gameService = new GameService();
	}

	public function play(): string
	{
		$message = '';

		$player1 = new Player($this->gameService->createPlayer(), 'Player 1');
		$player2 = new Player($this->gameService->createPlayer(), 'Player 2');

		$game = new Game($player1, $player2);
		if ($game->isReady() && $this->getStartNumber() > 0) {
			$message .= "GAME START ... \n";
			$message .= "Players are ready \n";

			$message .= $this->gameService->play($game, new GameNumber($this->getStartNumber()));

		} else {
			$message .= "GAME IS NOT READY!\n";
		}

		return $message . "GAME OVER \n";
	}

	private function getStartNumber(): int
	{
		return random_int(1, 100000);
	}
}
