<?php

namespace bincomtest\Acme\Repositories;

interface StateRepositoryInterface {

	public function getStates();

	public function getStateById( $id );
}