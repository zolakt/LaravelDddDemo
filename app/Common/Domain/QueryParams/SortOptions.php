<?php

namespace LaravelDemo\Common\Domain\QueryParams;

/**
 * Class SortOptions
 * @package LaravelDemo\Common\Domain\QueryParams
 * @property string $field
 * @property string $direction
 */
class SortOptions
{
	/**
	 * @var string
	 */
	protected $field;

	/**
	 * @var string
	 */
	protected $direction;

	public function __construct($field, $direction)
	{
		$this->field = $field;
		$this->direction = $direction;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
