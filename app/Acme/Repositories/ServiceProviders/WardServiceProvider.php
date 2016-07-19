<?php

namespace bincomtest\Acme\Repositories\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class WardServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('bincomtest\Acme\Repositories\WardRepositoryInterface', 'bincomtest\Acme\Repositories\DBWardRepository');
	}
}