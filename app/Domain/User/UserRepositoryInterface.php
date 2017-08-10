<?php

namespace LaravelDemo\Domain\User;

use LaravelDemo\Common\Domain\Repositories\RepositoryInterface;
use LaravelDemo\Domain\User\QueryParams\UserQueryParams;
use LaravelDemo\Domain\User\QueryParams\SingleUserQueryParams;

interface UserRepositoryInterface extends RepositoryInterface
{

	public function findBy(UserQueryParams $params);
	
	public function findOneBy(SingleUserQueryParams $params);
}
