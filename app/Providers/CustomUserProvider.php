<?php

namespace LaravelDemo\Providers;

use Illuminate\Contracts\Auth\UserProvider;
use LaravelDemo\Services\User\UserServiceInterface;
use LaravelDemo\Services\User\Messages\GetUserRequest;
use LaravelDemo\Services\User\Messages\UpdateUserRequest;
use LaravelDemo\Domain\User\QueryParams\SingleUserQueryParams;

class CustomUserProvider implements UserProvider
{
	/**
	 *
	 * @var UserServiceInterface
	 */
	protected $userService;
	
	public function __construct(UserServiceInterface $service)
	{
		$this->userService = $service;
	}

	public function retrieveByCredentials(array $credentials)
	{
		$params = new SingleUserQueryParams();
		$params->username = $credentials['email'];
		
		$request = new GetUserRequest();
		$request->queryParams = $params;
		
		$response = $this->userService->getUser($request);
		return $response->result;
	}

	public function retrieveById($identifier)
	{
		$params = new SingleUserQueryParams();
		$params->id = $identifier;
		
		$request = new GetUserRequest();
		$request->queryParams = $params;
		
		$response = $this->userService->getUser($request);
		return $response->result;
	}

	public function retrieveByToken($identifier, $token)
	{
		$params = new SingleUserQueryParams();
		$params->id = $identifier;
		$params->token = $token;
		
		$request = new GetUserRequest();
		$request->queryParams = $params;
		
		$response = $this->userService->getUser($request);
		return $response->result;
	}

	public function updateRememberToken(\Illuminate\Contracts\Auth\Authenticatable $user, $token): void
	{
		$request = new UpdateUserRequest();
		$request->id = $user->getAuthIdentifier();
		$request->userProperties = array(
			$user->getRememberTokenName() => $token
		);

		$response = $this->userService->updateUser($request);
		return $response->result;
	}

	public function validateCredentials(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials): bool
	{
		return \Hash::check($credentials['password'], $user->getAuthPassword());
	}

}
