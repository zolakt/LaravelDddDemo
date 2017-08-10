<?php

namespace LaravelDemo\Services\Task\Messages;

/**
 * Class InsertTaskRequest
 * @package LaravelDemo\Services\Task\Messages
 * @property array taskProperties
 */
class InsertTaskRequest
{
	protected $taskProperties;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
