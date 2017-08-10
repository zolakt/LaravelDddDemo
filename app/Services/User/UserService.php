<?php

namespace LaravelDemo\Services\User;

use LaravelDemo\Common\Services\ServiceBase;
use LaravelDemo\Common\Services\ServiceResponse;
use LaravelDemo\Domain\User\UserRepositoryInterface;
use LaravelDemo\Services\User\Messages\GetUserRequest;
use LaravelDemo\Services\User\Messages\GetUsersRequest;
use LaravelDemo\Services\User\Messages\UpdateUserRequest;

class UserService extends ServiceBase implements UserServiceInterface
{
	/**
	 * @var UserRepositoryInterface
	 */
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * @param GetUserRequest $request
	 * @return ServiceResponse
	 */
	function getUser(GetUserRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				return $this->userRepository->findOneBy($request->queryParams);
			});
	}

	/**
	 * @param GetUsersRequest $request
	 * @return ServiceResponse
	 */
	function getUsers(GetUsersRequest $request)
	{
		return $this->buildResponse(function() use ($request) {
				return $this->userRepository->findBy($request->queryParams);
			});
	}

	/**
	 * @param UpdateUserRequest $request
	 * @return ServiceResponse
	 */
	function updateUser(UpdateUserRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				$existing = $this->userRepository->find($request->id);
				$changed = $this->convertFromDto($request->userProperties, $existing);
				return $this->userRepository->update($changed);
			});
	}

}
