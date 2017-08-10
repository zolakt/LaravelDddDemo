<?php

namespace LaravelDemo\Common\Domain\QueryParams;

/**
 * Class PaginationOptions
 * @package LaravelDemo\Common\Domain\QueryParams
 * @property int $page
 * @property int $limit
 */
class PaginationOptions
{
	/**
	 * @var int
	 */
	protected $page;

	/**
	 * @var int
	 */
	protected $limit;

	public function __construct($limit, $page = 1)
	{
		$this->page = $page;
		$this->limit = $limit;
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
