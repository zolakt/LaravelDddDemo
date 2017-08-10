<?php

namespace LaravelDemo\Domain\Address;

use LaravelDemo\Common\Domain\ValueObjectBase;

/**
 * Class Address
 * @package LaravelDemo\Domain\Address
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $houseNumber
 */
class Address extends ValueObjectBase
{
	protected $country;
	protected $city;
	protected $street;
	protected $houseNumber;

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}

}
