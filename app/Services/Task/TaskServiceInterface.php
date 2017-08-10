<?php

namespace LaravelDemo\Services\Task;

use LaravelDemo\Common\Services\ServiceResponse;
use LaravelDemo\Services\Task\Messages\DeleteTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTasksRequest;
use LaravelDemo\Services\Task\Messages\InsertTaskRequest;
use LaravelDemo\Services\Task\Messages\UpdateTaskRequest;

interface TaskServiceInterface
{

	/**
	 * @param GetTaskRequest $request
	 * @return ServiceResponse
	 */
	function getTask(GetTaskRequest $request);

	/**
	 * @param GetTasksRequest $request
	 * @return ServiceResponse
	 */
	function getTasks(GetTasksRequest $request);

	/**
	 * @param InsertTaskRequest $request
	 * @return ServiceResponse
	 */
	function insertTask(InsertTaskRequest $request);

	/**
	 * @param UpdateTaskRequest $request
	 * @return ServiceResponse
	 */
	function updateTask(UpdateTaskRequest $request);

	/**
	 * @param DeleteTaskRequest $request
	 * @return ServiceResponse
	 */
	function deleteTask(DeleteTaskRequest $request);
}
