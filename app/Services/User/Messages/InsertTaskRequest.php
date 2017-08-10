<?php

namespace LaravelDemo\Services\User\Messages;

/**
 * Class InsertUserRequest
 * @package LaravelDemo\Services\User\Messages
 * @property array $userProperties
 */
class InsertUserRequest
{
	protected $userProperties;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
