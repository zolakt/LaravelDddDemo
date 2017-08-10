<?php

namespace LaravelDemo\DAL\Eloquent\User\Mapper;

use LaravelDemo\Domain\Address\Address;
use LaravelDemo\Domain\User\User;

class UserDbMapper implements UserDbMapperInterface
{

	/**
	 * @param User $entity
	 * @param \LaravelDemo\DAL\Eloquent\User\User $model
	 * @return \LaravelDemo\DAL\Eloquent\User\User
	 */
	public function convertToDbType($entity, $model = null)
	{
		$dbModel = new \LaravelDemo\DAL\Eloquent\User\User();
		$dbModel->id = $entity->id;
		$dbModel->email = $entity->email;
		$dbModel->password = $entity->password;
		$dbModel->remember_token = $entity->rememberToken;
		$dbModel->first_name = $entity->firstName;
		$dbModel->last_name = $entity->lastName;

		if (!empty($entity->address)) {
			$dbModel->country = $entity->address->country;
			$dbModel->city = $entity->address->city;
			$dbModel->street = $entity->address->street;
			$dbModel->house_number = $entity->address->houseNumber;
		}

		return $dbModel;
	}

	/**
	 * @param \LaravelDemo\DAL\Eloquent\User\User $model
	 * @return User
	 */
	public function convertToDomainType($model)
	{
		$entity = new User();
		$entity->id = $model->id;
		$entity->email = $model->email;
		$entity->password = $model->password;
		$entity->rememberToken = $model->remember_token;
		$entity->firstName = $model->first_name;
		$entity->lastName = $model->last_name;

		$address = new Address();
		$address->country = $model->country;
		$address->city = $model->city;
		$address->street = $model->street;
		$address->houseNumber = $model->house_number;
		$entity->address = $address;

		return $entity;
	}

}
