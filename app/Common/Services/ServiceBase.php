<?php

namespace LaravelDemo\Common\Services;

abstract class ServiceBase
{
	protected function buildResponse($responseFunc)
	{
		$response = new ServiceResponse();
		$response->result = true;

		try {
			$result = $responseFunc();
			$response->result = $result;
		} catch (\Exception $e) {
			$response->exception = $e;
			$response->result = null;
		}

		return $response;
	}

}
