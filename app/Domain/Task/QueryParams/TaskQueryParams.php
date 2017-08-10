<?php

namespace LaravelDemo\Domain\Task\QueryParams;

use LaravelDemo\Common\Domain\QueryParams\QueryParams;

/**
 * Class TaskQueryParams
 * @package LaravelDemo\Domain\Task\QueryParams
 * @property FilterOptions $filter
 * @property IncludeOptions $include
 */
class TaskQueryParams extends QueryParams
{

	public function __construct()
	{
		parent::__construct();

		$this->filter = new FilterOptions();
		$this->include = new IncludeOptions();
	}

	/**
	 * @var FilterOptions
	 */
	protected $filter;

	/**
	 * @var IncludeOptions
	 */
	protected $include;

}
