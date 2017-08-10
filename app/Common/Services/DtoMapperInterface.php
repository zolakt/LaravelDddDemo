<?php

namespace LaravelDemo\Common\Services;

interface DtoMapperInterface
{

	public function convertToDto($entity);

	public function convertFromDto($dto, $entity);
}
