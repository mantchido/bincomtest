<?php

namespace bincomtest\Acme\Repositories;

use DB;
use Auth;

class DBStateRepository implements StateRepositoryInterface {

	public function getStates()
	{
		$states = DB::table('states')->get();

		return $states;
	}

	public function getStateById( $id )
	{
		$state = DB::table('states')
					->where('state_id', '=', $id)
					->first();

		return $state;
	}
}