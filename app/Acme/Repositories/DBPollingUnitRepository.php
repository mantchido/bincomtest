<?php

namespace bincomtest\Acme\Repositories;

use DB;
use Auth;

class DBPollingUnitRepository implements PollingUnitRepositoryInterface {
	
	public function getPollingUnits()
	{
		$pollingUnits = DB::table('polling_unit')
						->where('polling_unit_id', '>', 0)
						->get();

		return $pollingUnits;
	}

	public function getPollingUnitById( $pollingUnitId )
	{
		$pollingUnit = DB::table('polling_unit')
					->where('polling_unit_id', '=', $polling_unit_id)
					->first();

		return $pollingUnit;
	}

	public function getPollingUnitName( $pollingUnitId )
	{
		$pollingUnit = DB::table('polling_unit')
					->select('polling_unit_name')
					->where('uniqueid', '=', $pollingUnitId)
					->first();

		return $pollingUnit;
	}

	public function addResult($unitID, $party, $score, $agent, $date, $agentip)
	{

	}
}