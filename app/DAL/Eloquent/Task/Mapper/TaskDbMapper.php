<?php

namespace LaravelDemo\DAL\Eloquent\Task\Mapper;

use LaravelDemo\DAL\Eloquent\User\Mapper\UserDbMapperInterface;
use LaravelDemo\Domain\Task\Task;
use LaravelDemo\Domain\User\User;

class TaskDbMapper implements TaskDbMapperInterface
{
	protected $userDbMapper;

	public function __construct(UserDbMapperInterface $userDbMapper)
	{
		$this->userDbMapper = $userDbMapper;
	}

	/**
	 * @param Task $entity
	 * @param \LaravelDemo\DAL\Eloquent\Task\Task
	 * @return \LaravelDemo\DAL\Eloquent\Task\Task
	 */
	public function convertToDbType($entity, $dbModel = null)
	{
		if (empty($dbModel)) {
			$dbModel = new \LaravelDemo\DAL\Eloquent\Task\Task();
		}

		$dbModel->id = $entity->id;
		$dbModel->name = $entity->name;
		$dbModel->time = $entity->time;
		$dbModel->user_id = $entity->user->id;

		return $dbModel;
	}

	/**
	 * @param \LaravelDemo\DAL\Eloquent\Task\Task $model
	 * @return Task
	 */
	public function convertToDomainType($model)
	{
		$entity = new Task();
		$entity->id = $model->id;
		$entity->name = $model->name;
		$entity->time = $model->time;

		if (isset($model->user_id)) {
			if ($model->relationLoaded('user')) {
				$user = $this->userDbMapper->convertToDomainType($model->user);
			} else {
				$user = new User();
				$user->id = $model->user_id;
			}

			$entity->user = $user;
		}

		return $entity;
	}

}
