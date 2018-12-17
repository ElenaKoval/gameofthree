<?php

namespace GameOfThree\Entity;

class GameNumber
{
	private $number;

	public function __construct(int $number)
	{
		if ($number <= 0) {
			throw new \Exception('The number should be whole.');
		}
		$this->number = $number;
	}

	public function getNumber(): int
	{
		return $this->number;
	}

	public function setNumber(int $number): void
	{
		$this->number = $number;
	}
}
