<?php

namespace LaravelDemo\Domain\Task;

use LaravelDemo\Common\Domain\EntityBase;
use LaravelDemo\Domain\User\User;

/**
 * Class Task
 * @package LaravelDemo\Domain\Task
 * @property string $name
 * @property \DateTime $time
 * @property User $user
 */
class Task extends EntityBase
{
	protected $name;
	protected $time;
	protected $user;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
