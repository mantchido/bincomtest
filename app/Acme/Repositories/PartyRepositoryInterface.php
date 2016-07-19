<?php 

namespace bincomtest\Acme\Repositories;

interface PartyRepositoryInterface {

	public function getParties();

	public function getParty( $id );	
}