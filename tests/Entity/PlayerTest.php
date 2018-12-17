<?php

namespace Tests\Entity;

use GameOfThree\Entity\Player;
use GameOfThree\Entity\PlayerId;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
	public function testCanCreatePlayer()
	{
		$playerId = new PlayerId(100);
		$player = new Player($playerId, 'test');

		self::assertEquals($playerId->getId(), $player->getId());
		self::assertEquals('test', $player->getName());
	}

	public function testAddNumber()
	{
		$playerId = new PlayerId(100);
		$player = new Player($playerId, 'test');

		$player->setNumber(3);
		self::assertEquals(0, $player->addNumber());

		$player->setNumber(2);
		self::assertEquals(1, $player->addNumber());

		$player->setNumber(4);
		self::assertEquals(-1, $player->addNumber());
	}

	public function testGetResultNumber()
	{
		$playerId = new PlayerId(100);
		$player = new Player($playerId, 'test');

		$player->setNumber(3);
		self::assertEquals(1, $player->getResultNumber());

		$player->setNumber(2);
		self::assertEquals(1, $player->getResultNumber());

		$player->setNumber(4);
		self::assertEquals(1, $player->getResultNumber());

		$player->setNumber(9);
		self::assertEquals(3, $player->getResultNumber());

		$player->setNumber(10);
		self::assertEquals(3, $player->getResultNumber());
	}
}
