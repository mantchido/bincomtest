<?php 

namespace bincomtest\Acme\Repositories;

interface PollingUnitResultRepositoryInterface {

	public function getResults( $pollingUnitId );

	public function getPartyResult( $partyId );

	public function getResultsByLGA( $lgaId );
}