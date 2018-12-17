<?php

namespace GameOfThree\Entity;

class Player
{
	private $id;
	private $name;
	private $number = 0;

	public function __construct(PlayerId $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	public function getId(): int
	{
		return $this->id->getId();
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getNumber(): int
	{
		return $this->number;
	}

	public function setNumber(int $number): void
	{
		$this->number = $number;
	}

	public function addNumber(): int
	{
		switch($this->getNumber() % 3) {
			case 0:
				return 0;
				break;
			case 1:
				return -1;
				break;
			case 2:
				return 1;
				break;
		}
	}

	public function getResultNumber(): int
	{
		switch($this->getNumber() % 3) {
			case 0:
				return $this->getNumber() / 3;
				break;
			case 1:
				return ($this->getNumber() - 1) / 3;
				break;
			case 2:
				return ($this->getNumber() + 1) / 3;
				break;
		}
	}
}

