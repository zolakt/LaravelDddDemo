<?php

namespace LaravelDemo\Services\Task\Messages;

/**
 * Class DeleteTaskRequest
 * @package LaravelDemo\Services\Task\Messages
 * @property int id
 */
class DeleteTaskRequest
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
