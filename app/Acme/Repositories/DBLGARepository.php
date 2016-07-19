<?php

namespace bincomtest\Acme\Repositories;

use DB;
use Auth;

class DBLGARepository implements LGARepositoryInterface {

	public function getLGAs()
	{
		$lgas = DB::table('lga')->get();

		return $lgas;
	}

	public function getLGA( $id )
	{
		$lga = DB::table('lga')
					->where('lga_id', '=', $id)
					->first();

		return $lga;
	}

	public function getLGAName( $lgaId )
	{
		$lga = DB::table('lga')
					->where('lga_id', '=', $lgaId)
					->select('lga_name')
					->first();

		return $lga;
	}

	public function stateLGAs( $stateID )
	{

	}
}