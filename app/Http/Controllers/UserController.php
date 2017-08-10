<?php

namespace LaravelDemo\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDemo\Domain\User\QueryParams\UserQueryParams;
use LaravelDemo\Services\User\Messages\GetUserRequest;
use LaravelDemo\Services\User\Messages\GetUsersRequest;
use LaravelDemo\Services\User\Messages\UpdateUserRequest;
use LaravelDemo\Services\User\UserServiceInterface;
use LaravelDemo\Services\User\Mapper\UserDtoMapperInterface;
use LaravelDemo\Domain\User\QueryParams\SingleUserQueryParams;

class UserController extends ApiController
{
	/**
	 * @var UserServiceInterface
	 */
	protected $userService;

	public function __construct(UserServiceInterface $userService, UserDtoMapperInterface $mapper)
	{
		$this->userService = $userService;
		
		parent::__construct($mapper);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$params = new SingleUserQueryParams();
		$params->id = $id;
		
		$serviceRequest = new GetUserRequest();
		$serviceRequest->queryParams = $params;

		$response = $this->userService->getUser($serviceRequest);
		return $this->response($response);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$taskParams = new UserQueryParams();
		$taskParams->filter->country = $request->input('country');
		$taskParams->filter->city = $request->input('city');
		$taskParams->include->tasks = (bool) $request->input('includeTasks');

		$serviceRequest = new GetUsersRequest();
		$serviceRequest->queryParams = $taskParams;

		$response = $this->userService->getUsers($serviceRequest);
		return $this->response($response);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$serviceRequest = new UpdateUserRequest();
		$serviceRequest->id = $id;
		$serviceRequest->userProperties = $request->all();

		$response = $this->userService->updateUser($serviceRequest);
		return $this->response($response);
	}

}
