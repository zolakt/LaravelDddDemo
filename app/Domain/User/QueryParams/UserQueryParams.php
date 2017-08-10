<?php

namespace LaravelDemo\Domain\User\QueryParams;

use LaravelDemo\Common\Domain\QueryParams\QueryParams;

/**
 * Class UserQueryParams
 * @package LaravelDemo\Domain\User\QueryParams
 * @property FilterOptions $filter
 * @property IncludeOptions $include
 */
class UserQueryParams extends QueryParams
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
