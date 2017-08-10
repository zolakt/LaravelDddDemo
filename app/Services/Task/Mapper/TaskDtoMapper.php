<?php

namespace LaravelDemo\Services\Task\Mapper;

use LaravelDemo\Domain\User\User;

class TaskDtoMapper implements TaskDtoMapperInterface
{
	function convertToDto($entity)
	{
		$result = array(
			'id' => $entity->id,
			'name' => $entity->name,
			'time' => $entity->time
		);
		
		if ($entity->user){
			$result['userId'] = $entity->user->id;
			$result['userFirstName'] = $entity->user->firstName;
			$result['userLastName'] = $entity->user->lastName;
		}
		
		return $result;
	}

	function convertFromDto($dto, $entity)
	{
		if(isset($dto['name'])){
			$entity->name = $dto['name'];
		}
		if(isset($dto['time'])){
			$entity->time = $dto['time'];
		}
		if(isset($dto['userId'])){
			if (empty($entity->user)){
				$entity->user = new User();
			}
			$entity->user->id = $dto['userId'];
		}

		return $entity;
	}
}
