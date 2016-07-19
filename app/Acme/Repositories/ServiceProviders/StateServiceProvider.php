<?php

namespace bincomtest\Acme\Repositories\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class StateServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('bincomtest\Acme\Repositories\StateRepositoryInterface', 'bincomtest\Acme\Repositories\DBStateRepository');
	}
}