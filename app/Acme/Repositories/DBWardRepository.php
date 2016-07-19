<?php

namespace bincomtest\Acme\Repositories;

use DB;
use Auth;

class DBWardRepository implements WardRepositoryInterface {

	public function getWards()
	{
		$wards = DB::table('ward')->get();

		return $wards;
	}

	public function getWardById( $wardID )
	{
		$ward = DB::table('ward')
					->where('ward_id', '=', $id)
					->first();

		return $ward;
	}

	public function getLGAWards( $lgaID )
	{
		
	}
}