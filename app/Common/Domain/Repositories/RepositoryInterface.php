<?php

namespace LaravelDemo\Common\Domain\Repositories;

interface RepositoryInterface extends ReadOnlyRepositoryInterface
{

	public function update($entity);

	public function insert($entity);

	public function delete($id);
}
