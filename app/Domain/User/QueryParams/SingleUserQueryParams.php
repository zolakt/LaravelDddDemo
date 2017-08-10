<?php

namespace LaravelDemo\Domain\User\QueryParams;

/**
 * Class UserQueryParams
 * @package LaravelDemo\Domain\User\QueryParams
 * @property int $id
 * @property string $username
 * @property string $token
 */
class SingleUserQueryParams
{
	protected $id;
	
	protected $username;
	
	protected $token;


	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
