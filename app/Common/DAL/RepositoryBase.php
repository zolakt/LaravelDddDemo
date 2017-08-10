<?php

namespace LaravelDemo\Common\DAL;

abstract class RepositoryBase
{
	/**
	 * @var DbMapperInterface
	 */
	protected $mapper;

	public function __construct(DbMapperInterface $mapper)
	{
		$this->mapper = $mapper;
	}

	protected function convertToDbType($entity, $model = null)
	{
		return $this->mapper->convertToDbType($entity, $model);
	}

	protected function convertToDomainType($model)
	{
		return $this->mapper->convertToDomainType($model);
	}

	protected function convertListToDbType($entities)
	{
		$result = array();

		foreach ($entities as $entity) {
			$result[] = $this->convertToDbType($entity);
		}

		return $result;
	}

	protected function convertListToDomainType($models)
	{
		$result = array();

		foreach ($models as $model) {
			$result[] = $this->convertToDomainType($model);
		}

		return $result;
	}

}
