<?php

namespace LaravelDemo\Services\Task\Messages;

/**
 * Class GetTaskRequest
 * @package LaravelDemo\Services\Task\Messages
 * @property int id
 */
class GetTaskRequest
{
	protected $id;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
