<?php

namespace LaravelDemo\Domain\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use LaravelDemo\Common\Domain\EntityBase;
use LaravelDemo\Domain\Address\Address;

/**
 * Class User
 * @package LaravelDemo\Domain\User
 * @property string $email
 * @property string $password
 * @property string $rememberToken
 * @property string $firstName
 * @property string $lastName
 * @property Address $address
 */
class User extends EntityBase implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
	use Notifiable;
	use Authorizable;
	use CanResetPassword;
	
	protected $email;
	protected $password;
	protected $rememberToken;
	protected $firstName;
	protected $lastName;
	protected $address;

	public function __construct()
	{
		$this->address = new Address();
	}

	
	public function getAuthIdentifier()
	{
		return $this->id;
	}

	public function getAuthIdentifierName(): string
	{
		return 'id';
	}

	public function getAuthPassword(): string
	{
		return $this->password;
	}

	public function getRememberToken(): string
	{
		return $this->rememberToken;
	}

	public function getRememberTokenName(): string
	{
		return 'rememberToken';
	}

	public function setRememberToken($value): void
	{
		$this->remember_token = $value;
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
