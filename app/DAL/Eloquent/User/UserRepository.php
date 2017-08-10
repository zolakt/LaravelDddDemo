<?php

namespace LaravelDemo\DAL\Eloquent\User;

use LaravelDemo\Common\DAL\RepositoryBase;
use LaravelDemo\DAL\Eloquent\User\Mapper\UserDbMapperInterface;
use LaravelDemo\Domain\User\QueryParams\SingleUserQueryParams;
use LaravelDemo\Domain\User\QueryParams\UserQueryParams;
use LaravelDemo\Domain\User\UserRepositoryInterface;

class UserRepository extends RepositoryBase implements UserRepositoryInterface
{

	public function __construct(UserDbMapperInterface $mapper)
	{
		parent::__construct($mapper);
	}

	/**
	 * @param int $id
	 * @return \LaravelDemo\Domain\User\User
	 */
	public function find($id)
	{
		$model = User::find($id);
		return $this->convertToDomainType($model);
	}
	
	/**
	 * 
	 * @param SingleUserQueryParams $params
	 */
	public function findOneBy(SingleUserQueryParams $params)
	{
		$query = User::query();
		
		if ($params){
			if ($params->id){
				$query = $query->where('id', '=', $params->id);
			}
			if ($params->username){
				$query = $query->where('email', '=', $params->username);
			}
			if ($params->token){
				$query = $query->where('remember_token', '=', $params->token);
			}
		}

		$models = $params ? $query->first() : null;
		return $this->convertToDomainType($models);
	}

	/**
	 * @param UserQueryParams $params
	 * @return array
	 */
	public function findBy(UserQueryParams $params)
	{
		$query = User::query();

		if ($params && $params->include) {
			if ($params->include->tasks) {
				$query = $query->with('tasks');
			}
		}

		if ($params && $params->filter) {
			if ($params->filter->country) {
				$query = $query->where('country', '=', $params->filter->country);
			}
			if ($params->filter->city) {
				$query = $query->where('city', '=', $params->filter->city);
			}
		}

		if ($params && $params->pagination && $params->pagination->limit) {
			$query = $query->paginate($params->pagination->limit, ['*'], 'page', $params->pagination->page);
		}

		$models = $query->get();
		return $this->convertListToDomainType($models);
	}

	/**
	 * @param \LaravelDemo\Domain\User\User $entity
	 * @return \LaravelDemo\Domain\User\User
	 */
	public function update($entity)
	{
		$model = User::find($entity->id);

		if ($model) {
			$this->convertToDbType($entity, $model);
			$model->save();
		}

		return $this->convertToDomainType($model);
	}

	/**
	 * @param \LaravelDemo\Domain\User\User $entity
	 * @return \LaravelDemo\Domain\User\User
	 */
	public function insert($entity)
	{
		$model = $this->convertToDbType($entity);
		$model->save();
		return $this->convertToDomainType($model);
	}

	/**
	 * @param $id
	 * @return \LaravelDemo\Domain\User\User
	 */
	public function delete($id)
	{
		$model = User::find($id);

		if ($model) {
			$model->delete();
		}

		return $this->convertToDomainType($model);
	}

}
