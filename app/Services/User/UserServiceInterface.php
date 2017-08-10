<?php

namespace LaravelDemo\Services\User;

use LaravelDemo\Common\Services\ServiceResponse;
use LaravelDemo\Services\User\Messages\GetUserRequest;
use LaravelDemo\Services\User\Messages\GetUsersRequest;
use LaravelDemo\Services\User\Messages\UpdateUserRequest;

interface UserServiceInterface
{	
	/**
	 * @param GetUserRequest $request
	 * @return ServiceResponse
	 */
	function getUser(GetUserRequest $request);

	/**
	 * @param GetUsersRequest $request
	 * @return ServiceResponse
	 */
	function getUsers(GetUsersRequest $request);

	/**
	 * @param UpdateUserRequest $request
	 * @return ServiceResponse
	 */
	function updateUser(UpdateUserRequest $request);
}
