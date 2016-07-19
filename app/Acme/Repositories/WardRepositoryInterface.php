<?php

namespace bincomtest\Acme\Repositories;

interface WardRepositoryInterface {

	public function getWards();

	public function getWardById( $wardID );

	public function getLGAWards( $lgaID );

	
}