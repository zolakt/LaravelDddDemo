<?php

namespace LaravelDemo\Http\Controllers;

use LaravelDemo\Common\Services\ServiceResponse;
use LaravelDemo\Common\Services\DtoMapperInterface;

class ApiController extends Controller
{
	/**
	 * @var DtoMapperInterface
	 */
	protected $dtoMapper;

	public function __construct(DtoMapperInterface $mapper)
	{
		$this->dtoMapper = $mapper;
	}

	protected function convertToDto($entity)
	{
		return $this->dtoMapper->convertToDto($entity);
	}

	protected function convertFromDto($dto, $entity)
	{
		return $this->dtoMapper->convertFromDto($dto, $entity);
	}

	protected function convertListToDto($entities)
	{
		$result = array();

		foreach ($entities as $entity) {
			$result[] = $this->convertToDto($entity);
		}

		return $result;
	}

	protected function response(ServiceResponse $response)
	{
		if ($response->exception) {
			return response()->json($response->exception, 500);
		}

		$result = is_array($response->result) ? 
			$this->convertListToDto($response->result) : 
			$this->convertToDto($response->result);
		
		return response()->json($result, 200);
	}

}
