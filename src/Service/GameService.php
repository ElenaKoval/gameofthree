<?php

namespace GameOfThree\Service;

use GameOfThree\Entity\Game;
use GameOfThree\Entity\GameNumber;
use GameOfThree\Entity\PlayerId;
use Symfony\Component\Process\Process;

class GameService
{
	public function createPlayer(): PlayerId
	{
		$process = new Process(['/usr/bin/php', 'player.php']);
		$process->start();

		return new PlayerId($process->getPid());
	}

	public function play(Game $game, GameNumber $gameNumber): string
	{
		$game->addText('Game is starting ... ');
		$game->addText(sprintf('Start number is %s', $gameNumber->getNumber()));

		while ($gameNumber->getNumber() != 1) {
			foreach ($game->getPlayer() as $player) {
				$player->setNumber($gameNumber->getNumber());
				$number = $player->addNumber();
				$resultNumber = $player->getResultNumber();

				$gameNumber->setNumber($resultNumber);

				$game->addText(sprintf('%s got a number %d', $player->getName(), $player->getNumber()));
				$game->addText(sprintf('%s added %d', $player->getName(), $number));

				if ($gameNumber->getNumber() === 1) {
					$game->addText(sprintf('The WINNER is %s', $player->getName()));
					break;
				}
			}
		}

		return $game->getText();
	}
}

