<?php

namespace LaravelDemo\Common\Domain\Repositories;

interface ReadOnlyRepositoryInterface
{

	function find($id);
}
