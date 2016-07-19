<?php

namespace bincomtest\Acme\Repositories;

interface LGARepositoryInterface {

	public function getLGAs();

	public function getLGA( $id );

	public function stateLGAs( $stateID );

	public function getLGAName( $lgaId );
}