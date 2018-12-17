<?php

namespace GameOfThree\Entity;

class PlayerId
{
	private $id;

	public function __construct(int $id)
	{
		if (!is_int($id)) {
			throw new \Exception('Player is not ready!');
		}

		$this->id = $id;
	}

	public function getId(): int
	{
		return $this->id;
	}
}
