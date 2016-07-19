<?php

namespace bincomtest\Acme\Repositories\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class LGAServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind('bincomtest\Acme\Repositories\LGARepositoryInterface', 'bincomtest\Acme\Repositories\DBLGARepository');
	}
}