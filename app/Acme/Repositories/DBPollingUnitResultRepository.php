<?php

namespace bincomtest\Acme\Repositories;

use DB;
use Auth;

class DBPollingUnitResultRepository implements PollingUnitResultRepositoryInterface {

	public function getResults( $pollingUnitId )
	{
		$results = DB::table('announced_pu_results')
					->where('polling_unit_uniqueid', '=', $pollingUnitId)
					->get();
		return $results;
	}

	public function getPartyResult( $partyId )
	{
		$result = DB::table('announced_pu_results')
					->where('party_abbreviation', '=', $partyId)
					->first();

		return $result;
	}

	public function getResultsByLGA( $lgaId )
	{
		$results = DB::table('lga')
					->where('lga.lga_id', '=', $lgaId)
					->join('polling_unit', 'lga.lga_id', '=', 'polling_unit.lga_id')
					->join('announced_pu_results', 'polling_unit.uniqueid', '=', 'announced_pu_results.polling_unit_uniqueid')
					->get();
		return $results = collect($results);
	}
}