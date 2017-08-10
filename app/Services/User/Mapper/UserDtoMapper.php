<?php

namespace LaravelDemo\Services\User\Mapper;

class UserDtoMapper implements UserDtoMapperInterface
{

	function convertToDto($entity)
	{
		$result = array(
			'id' => $entity->id,
			'email' => $entity->email,
			'firstName' => $entity->firstName,
			'lastName' => $entity->lastName
		);

		if ($entity->address) {
			$result['country'] = $entity->address->country;
			$result['city'] = $entity->address->city;
			$result['street'] = $entity->address->street;
			$result['houseNumber'] = $entity->address->houseNumber;
		}

		return $result;
	}

	function convertFromDto($dto, $entity)
	{
		if (isset($dto['email'])) {
			$entity->email = $dto['email'];
		}
		if (isset($dto['password'])) {
			$entity->password = $dto['password'];
		}
		if (isset($dto['rememberToken'])) {
			$entity->rememberToken = $dto['rememberToken'];
		}
		if (isset($dto['firstName'])) {
			$entity->firstName = $dto['firstName'];
		}
		if (isset($dto['lastName'])) {
			$entity->lastName = $dto['lastName'];
		}
		if (isset($dto['country'])) {
			$entity->address->lastName = $dto['country'];
		}
		if (isset($dto['city'])) {
			$entity->address->city = $dto['city'];
		}
		if (isset($dto['street'])) {
			$entity->address->street = $dto['street'];
		}
		if (isset($dto['houseNumber'])) {
			$entity->address->houseNumber = $dto['houseNumber'];
		}

		return $entity;
	}

}
