<?php

namespace LaravelDemo\DAL\Eloquent\Task;

use LaravelDemo\Common\DAL\RepositoryBase;
use LaravelDemo\DAL\Eloquent\Task\Mapper\TaskDbMapperInterface;
use LaravelDemo\Domain\Task\QueryParams\TaskQueryParams;
use LaravelDemo\Domain\Task\TaskRepositoryInterface;

class TaskRepository extends RepositoryBase implements TaskRepositoryInterface
{

	public function __construct(TaskDbMapperInterface $mapper)
	{
		parent::__construct($mapper);
	}

	/**
	 * @param int $id
	 * @return \LaravelDemo\Domain\Task\Task
	 */
	public function find($id)
	{
		$model = Task::find($id);
		return $this->convertToDomainType($model);
	}

	/**
	 * @param TaskQueryParams $params
	 * @return array
	 */
	public function findBy(TaskQueryParams $params)
	{
		$query = Task::query();

		if ($params && $params->include) {
			if ($params->include->user) {
				$query = $query->with('user');
			}
		}

		if ($params && $params->filter) {
			if ($params->filter->userId) {
				$query = $query->where('user_id', '=', $params->filter->userId);
			}
		}

		if ($params && $params->pagination && $params->pagination->limit) {
			$query = $query->paginate($params->pagination->limit, ['*'], 'page', $params->pagination->page);
		}

		$models = $query->get();
		return $this->convertListToDomainType($models);
	}

	/**
	 * @param \LaravelDemo\Domain\Task\Task $entity
	 * @return \LaravelDemo\Domain\Task\Task
	 */
	public function update($entity)
	{
		$model = Task::find($entity->id);

		if ($model) {
			$this->convertToDbType($entity, $model);
			$model->save();
		}

		return $this->convertToDomainType($model);
	}

	/**
	 * @param \LaravelDemo\Domain\Task\Task $entity
	 * @return \LaravelDemo\Domain\Task\Task
	 */
	public function insert($entity)
	{
		$model = $this->convertToDbType($entity);
		$model->save();
		return $this->convertToDomainType($model);
	}

	/**
	 * @param $id
	 * @return \LaravelDemo\Domain\Task\Task
	 */
	public function delete($id)
	{
		$model = Task::find($id);

		if ($model) {
			$model->delete();
		}

		return $this->convertToDomainType($model);
	}

}
