<?php 

namespace bincomtest\Acme\Repositories;

interface PollingUnitRepositoryInterface {
	
	public function getPollingUnits();	

	public function getPollingUnitById( $pollingUnitId );

	public function getPollingUnitName( $pollingUnitId );

	public function addResult($unitID, $party, $score, $agent, $date, $agentip);
}