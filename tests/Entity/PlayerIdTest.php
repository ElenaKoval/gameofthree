<?php

namespace Tests\Entity;

use GameOfThree\Entity\PlayerId;
use PHPUnit\Framework\TestCase;

class PlayerIdTest extends TestCase
{
	public function testCanCreatePlayerId()
	{
		$playerId = new PlayerId(1000);
		self::assertEquals(1000, $playerId->getId());
	}

	public function testPlayerIdCanNotBeEmpty()
	{
		$this->expectException(\ArgumentCountError::class);

		new PlayerId();
	}
}
