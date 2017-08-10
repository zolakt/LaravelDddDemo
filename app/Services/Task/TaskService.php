<?php

namespace LaravelDemo\Services\Task;

use LaravelDemo\Common\Services\ServiceBase;
use LaravelDemo\Common\Services\ServiceResponse;
use LaravelDemo\Domain\Task\Task;
use LaravelDemo\Domain\Task\TaskRepositoryInterface;
use LaravelDemo\Services\Task\Messages\DeleteTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTasksRequest;
use LaravelDemo\Services\Task\Messages\InsertTaskRequest;
use LaravelDemo\Services\Task\Messages\UpdateTaskRequest;

class TaskService extends ServiceBase implements TaskServiceInterface
{
	/**
	 * @var TaskRepositoryInterface
	 */
	protected $taskRepository;

	public function __construct(TaskRepositoryInterface $taskRepository)
	{
		$this->taskRepository = $taskRepository;
	}

	/**
	 * @param GetTaskRequest $request
	 * @return ServiceResponse
	 */
	function getTask(GetTaskRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				return $this->taskRepository->find($request->id);
			});
	}

	/**
	 * @param GetTasksRequest $request
	 * @return ServiceResponse
	 */
	function getTasks(GetTasksRequest $request)
	{
		return $this->buildResponse(function() use ($request) {
				return $this->taskRepository->findBy($request->queryParams);
			});
	}

	/**
	 * @param InsertTaskRequest $request
	 * @return ServiceResponse
	 */
	function insertTask(InsertTaskRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				$newTask = $this->convertFromDto($request->taskProperties, new Task());
				return $this->taskRepository->insert($newTask);
			});
	}

	/**
	 * @param UpdateTaskRequest $request
	 * @return ServiceResponse
	 */
	function updateTask(UpdateTaskRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				$existing = $this->taskRepository->find($request->id);
				$changed = $this->convertFromDto($request->taskProperties, $existing);

				return $this->taskRepository->update($changed);
			});
	}

	/**
	 * @param DeleteTaskRequest $request
	 * @return ServiceResponse
	 */
	function deleteTask(DeleteTaskRequest $request)
	{
		return $this->buildResponse(function() use($request) {
				return $this->taskRepository->delete($request->id);
			});
	}

}
