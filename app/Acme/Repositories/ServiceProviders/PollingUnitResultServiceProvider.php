<?php

namespace bincomtest\Acme\Repositories\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class PollingUnitResultServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('bincomtest\Acme\Repositories\PollingUnitResultRepositoryInterface', 'bincomtest\Acme\Repositories\DBPollingUnitResultRepository');
	}
}