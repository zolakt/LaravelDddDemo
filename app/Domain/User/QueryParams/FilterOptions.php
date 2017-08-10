<?php

namespace LaravelDemo\Domain\User\QueryParams;

/**
 * Class FilterOptions
 * @package LaravelDemo\Domain\User\QueryParams
 * @property string $country
 * @property string $city
 */
class FilterOptions
{
	protected $country;
	protected $city;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
