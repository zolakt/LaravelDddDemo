<?php

namespace LaravelDemo\Domain\User\QueryParams;

/**
 * Class IncludeOptions
 * @package LaravelDemo\Domain\User\QueryParams
 * @property bool $tasks
 */
class IncludeOptions
{
	protected $tasks;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
