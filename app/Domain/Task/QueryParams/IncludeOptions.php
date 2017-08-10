<?php

namespace LaravelDemo\Domain\Task\QueryParams;

/**
 * Class IncludeOptions
 * @package LaravelDemo\Domain\Task\QueryParams
 * @property bool $user
 */
class IncludeOptions
{
	protected $user;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
