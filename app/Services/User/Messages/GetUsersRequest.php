<?php

namespace LaravelDemo\Services\User\Messages;

use LaravelDemo\Domain\User\QueryParams\UserQueryParams;

/**
 * Class GetUsersRequest
 * @package LaravelDemo\Services\User\Messages
 * @property UserQueryParams $queryParams
 */
class GetUsersRequest
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
