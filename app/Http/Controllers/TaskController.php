<?php

namespace LaravelDemo\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDemo\Domain\Task\QueryParams\TaskQueryParams;
use LaravelDemo\Services\Task\Messages\DeleteTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTaskRequest;
use LaravelDemo\Services\Task\Messages\GetTasksRequest;
use LaravelDemo\Services\Task\Messages\InsertTaskRequest;
use LaravelDemo\Services\Task\Messages\UpdateTaskRequest;
use LaravelDemo\Services\Task\TaskServiceInterface;
use LaravelDemo\Services\Task\Mapper\TaskDtoMapperInterface;

class TaskController extends ApiController
{
	/**
	 * @var TaskServiceInterface
	 */
	protected $taskService;

	public function __construct(TaskServiceInterface $taskService, TaskDtoMapperInterface $mapper)
	{
		$this->taskService = $taskService;
		
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
		$serviceRequest = new GetTaskRequest();
		$serviceRequest->id = $id;

		$response = $this->taskService->getTask($serviceRequest);
		return $this->response($response);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$taskParams = new TaskQueryParams();
		$taskParams->filter->userId = $request->input('userId');
		$taskParams->include->user = (bool) $request->input('includeUser');

		$serviceRequest = new GetTasksRequest();
		$serviceRequest->queryParams = $taskParams;

		$response = $this->taskService->getTasks($serviceRequest);
		return $this->response($response);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$serviceRequest = new InsertTaskRequest();
		$serviceRequest->taskProperties = $request->all();

		$response = $this->taskService->insertTask($serviceRequest);
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
		$serviceRequest = new UpdateTaskRequest();
		$serviceRequest->id = $id;
		$serviceRequest->taskProperties = $request->all();

		$response = $this->taskService->updateTask($serviceRequest);
		return $this->response($response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$serviceRequest = new DeleteTaskRequest();
		$serviceRequest->id = $id;

		$response = $this->taskService->deleteTask($serviceRequest);
		return $this->response($response);
	}

}
