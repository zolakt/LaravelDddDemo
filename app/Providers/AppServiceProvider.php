<?php

namespace LaravelDemo\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(\LaravelDemo\Services\Task\TaskServiceInterface::class, \LaravelDemo\Services\Task\TaskService::class);
		$this->app->bind(\LaravelDemo\Services\User\UserServiceInterface::class, \LaravelDemo\Services\User\UserService::class);

		$this->app->bind(\LaravelDemo\Domain\Task\TaskRepositoryInterface::class, \LaravelDemo\DAL\Eloquent\Task\TaskRepository::class);
		$this->app->bind(\LaravelDemo\Domain\User\UserRepositoryInterface::class, \LaravelDemo\DAL\Eloquent\User\UserRepository::class);

		$this->app->bind(\LaravelDemo\DAL\Eloquent\Task\Mapper\TaskDbMapperInterface::class, \LaravelDemo\DAL\Eloquent\Task\Mapper\TaskDbMapper::class);
		$this->app->bind(\LaravelDemo\DAL\Eloquent\User\Mapper\UserDbMapperInterface::class, \LaravelDemo\DAL\Eloquent\User\Mapper\UserDbMapper::class);

		$this->app->bind(\LaravelDemo\Services\Task\Mapper\TaskDtoMapperInterface::class, \LaravelDemo\Services\Task\Mapper\TaskDtoMapper::class);
		$this->app->bind(\LaravelDemo\Services\User\Mapper\UserDtoMapperInterface::class, \LaravelDemo\Services\User\Mapper\UserDtoMapper::class);
	}

}
