<?php

namespace LaravelDemo\Common\DAL;

interface DbMapperInterface
{
	public function convertToDbType($entity, $model = null);

	public function convertToDomainType($model);
}
