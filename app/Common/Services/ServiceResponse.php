<?php

namespace LaravelDemo\Common\Services;

/**
 * Class ServiceResponse
 * @package LaravelDemo\Common\Services
 * @property mixed $result
 * @property \Exception $exception
 */
class ServiceResponse
{
	/**
	 * @var mixed
	 */
	protected $result;

	/**
	 * @var \Exception
	 */
	protected $exception;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
