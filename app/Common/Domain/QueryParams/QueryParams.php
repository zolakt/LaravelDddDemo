<?php

namespace LaravelDemo\Common\Domain\QueryParams;

/**
 * Class QueryParams
 * @package LaravelDemo\Common\Domain\QueryParams
 * @property PaginationOptions $pagination
 */
class QueryParams
{
	/**
	 * @var PaginationOptions
	 */
	protected $pagination;

	/**
	 * @var array
	 */
	protected $sorting;

	public function __construct()
	{
		$this->sorting = [];
	}

	public function addSort($field, $direction)
	{
		array_push($this->sorting, new SortOptions($field, $direction));
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
