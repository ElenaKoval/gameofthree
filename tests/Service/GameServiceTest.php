<?php

namespace Tests\Service;

use GameOfThree\Entity\Game;
use GameOfThree\Entity\GameNumber;
use GameOfThree\Entity\Player;
use GameOfThree\Service\GameService;
use PHPUnit\Framework\TestCase;

class GameServiceTest extends TestCase
{
	public function testCreatePlayer()
	{
		$gameService = new GameService();
		$player = $gameService->createPlayer();

		self::assertNotEmpty($player->getId());
	}

	public function testCanPlay()
	{
		$gameService = new GameService();
		$game = new Game(
			new Player($gameService->createPlayer(), 'Test1'),
			new Player($gameService->createPlayer(), 'Test2')
		);
		$gameNumber = new GameNumber(3);

		$expectedText = "Game is starting ... 
			Start number is 3
			Test1 got a number 3
			Test1 added 0
			The WINNER is Test1
			";

		self::assertEquals(
			str_replace("\t", '', $expectedText),
			$gameService->play($game, $gameNumber)
		);
	}

	public function testNotValidGame()
	{
		$this->expectException(\Exception::class);
		$gameService = new GameService();
		$game = new Game(
			new Player($gameService->createPlayer(), 'Test1'),
			new Player($gameService->createPlayer(), 'Test2')
		);
		$gameNumber = new GameNumber(0);

		$expectedText = "GAME IS NOT READY!
			GAME OVER 
		";

		self::assertEquals(
			str_replace("\t", '', $expectedText),
			$gameService->play($game, $gameNumber)
		);
	}
}
