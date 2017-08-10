<?php

namespace LaravelDemo\Domain\Task\QueryParams;

/**
 * Class FilterOptions
 * @package LaravelDemo\Domain\Task\QueryParams
 * @property int $userId
 */
class FilterOptions
{
	protected $userId;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
