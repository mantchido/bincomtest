<?php

namespace bincomtest\Acme\Repositories\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class PollingUnitServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('bincomtest\Acme\Repositories\PollingUnitRepositoryInterface', 'bincomtest\Acme\Repositories\DBPollingUnitRepository');
	}
}