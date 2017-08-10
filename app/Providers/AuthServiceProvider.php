<?php

namespace LaravelDemo\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{	
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'LaravelDemo\Model' => 'LaravelDemo\Policies\ModelPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot()
	{
		\Auth::provider('ddd_auth', function($app, array $config) {
			return new CustomUserProvider(app('LaravelDemo\Services\User\UserServiceInterface'));
		});

		$this->registerPolicies();

		//
	}

}
