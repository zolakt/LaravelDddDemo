<?php

namespace LaravelDemo\Services\User\Messages;

use LaravelDemo\Domain\User\QueryParams\SingleUserQueryParams;

/**
 * Class GetUserRequest
 * @package LaravelDemo\Services\User\Messages
 * @property SingleUserQueryParams $queryParams
 */
class GetUserRequest
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
