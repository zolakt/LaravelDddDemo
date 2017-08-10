<?php

namespace LaravelDemo\Services\Task\Messages;

/**
 * Class GetTasksRequest
 * @package LaravelDemo\Services\Task\Messages
 * @property TaskQueryParams queryParams
 */
class GetTasksRequest
{
	protected $queryParams;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
