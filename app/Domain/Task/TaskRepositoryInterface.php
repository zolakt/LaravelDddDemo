<?php

namespace LaravelDemo\Domain\Task;

use LaravelDemo\Common\Domain\Repositories\RepositoryInterface;
use LaravelDemo\Domain\Task\QueryParams\TaskQueryParams;

interface TaskRepositoryInterface extends RepositoryInterface
{

	public function findBy(TaskQueryParams $params);
}
