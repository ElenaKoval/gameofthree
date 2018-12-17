<?php

namespace GameOfThree\Entity;

class Game
{
	private $firstPlayer;
	private $secondPlayer;
	private $players;
	private $text = [];

	public function __construct(Player $firstPlayer, Player $secondPlayer)
	{
		$this->firstPlayer = $firstPlayer;
		$this->secondPlayer = $secondPlayer;
		$this->players = [
			$this->firstPlayer,
			$this->secondPlayer
		];
	}

	public function getPlayer(): array
	{
		return $this->players;
	}

	public function isReady(): bool
	{
		return $this->firstPlayer->getId() != $this->secondPlayer->getId();
	}

	public function getFirstPlayer(): Player
	{
		return $this->firstPlayer;
	}

	public function getSecondPlayer(): Player
	{
		return $this->secondPlayer;
	}

	public function addText(string $text): void
	{
		$this->text[] = $text;
	}

	public function getText(): string
	{
		return implode("\n", $this->text) . "\n";
	}
}
