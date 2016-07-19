<?php

namespace bincomtest\Http\Controllers;

use Illuminate\Http\Request;

use bincomtest\Http\Requests;

use Redirect;

use Session;
use Validator;
use DB;

use bincomtest\Acme\Repositories\StateRepositoryInterface;
use bincomtest\Acme\Repositories\LGARepositoryInterface;
use bincomtest\Acme\Repositories\WardRepositoryInterface;
use bincomtest\Acme\Repositories\PollingUnitRepositoryInterface;
use bincomtest\Acme\Repositories\PollingUnitResultRepositoryInterface;

class PollingController extends Controller
{
	protected $pollingunit;

	public function __construct(PollingUnitRepositoryInterface $pollingunit)
	{
		$this->pollingunit = $pollingunit;
	}

	public function index()
	{
		return view('polling.public.index');
	}

	public function getCheckResult()
	{
		$data['pollingunits'] = $this->pollingunit->getPollingUnits();
		$data['pollingResults'] = null;

		return view('polling.public.pollresults')->with($data);
	}

	public function getSearch(Request $request, PollingUnitResultRepositoryInterface $resultRepo)
	{
		$data['pollingunit'] = $this->pollingunit->getPollingUnitName($request->input('pollingUnit'));
		$data['pollingunits'] = $this->pollingunit->getPollingUnits();
		$data['pollingResults'] =  $resultRepo->getResults($request->input('pollingUnit'));
		return view('polling.public.pollresults')->with($data);
	}

	public function getSummedResultView(LGARepositoryInterface $lga)
	{
		$data['pollresults'] = null;
		$data['lgas'] = $lga->getLGAs();
		return view('polling.public.summedresult')->with($data);
	}

	public function getSummedResult(PollingUnitResultRepositoryInterface $pollresults,LGARepositoryInterface $lga, Request $request)
	{
		$data['selectedlga'] = $lga->getLGAName($request->input('lga'));
		$data['pollresults'] = $pollresults->getResultsByLGA($request->input('lga'));
		$data['lgas'] = $lga->getLGAs();
		return view('polling.public.summedresult')->with($data);
	}

	public function getAgentLogin()
	{
		return view('polling.public.agentlogin');
	}

	public function postAgentLogin(Request $request)
	{
		$validator = Validator::make($request->all(), 
    		[
    			'firstname'			=>'required|min:3', 
    			'lastname'			=>'required|min:3'
			]);

    	if ($validator->fails()) {
            return Redirect::route('agent.login')
                ->withErrors($validator)
                ->withInput();
        }

		$user['firstname'] = $request->input('firstname');
		$user['lastname'] = $request->input('lastname');

		Session::push('user', $user);

		return Redirect::route('new.unit');
	}

	public function getAgentLogout()
	{
		Session::pull('user');
		return Redirect::route('agent.login');
	}

	public function getAddUnit(LGARepositoryInterface $lga, WardRepositoryInterface $ward)
	{
		if(!Session::has('user'))
		{
			return Redirect::to('/login');
		}

		$lgas = $lga->getLGAs();
		$wards = $ward->getWards();

		return view('polling.public.addunit', compact('lgas', 'wards'));
	}

	public function postAddUnit(Request $request, LGARepositoryInterface $lga, WardRepositoryInterface $ward)
	{
		$validator = Validator::make($request->all(), 
    		[
    			'wardid'			=>'required', 
    			'lga'				=>'required',
    			'pollingunitname' 	=>'required|alpha',
    			'longitude'			=>'required|alpha_num',
    			'latitude'			=>'required|alpha_num'
			]);

    	if ($validator->fails()) {
            return Redirect::route('new.unit')
                ->withErrors($validator)
                ->withInput();
        }

        $pollingunit = DB::table('polling_unit')
				->insert([
						'ward_id'					=> $request->input('wardid'),
						'lga_id'					=> $request->input('lga'),
						'polling_unit_number'		=> $request->input('pollingunitnumber'),
						'polling_unit_name'			=> $request->input('pollingunitname'),
						'polling_unit_description'	=> $request->input('unitdescription'),
						'lat'						=> $request->input('latitude'),
						'long'						=> $request->input('longitude'),
						'entered_by_user'			=> Session::get('user')[0]['firstname'] .' '.Session::get('user')[1]['lastname'],
						'date_entered'				=> \Carbon\Carbon::now(),
						'user_ip_address'			=> $request->ip()
					]);
		if($pollingunit)
		{
			Session::flash('success', 'Polling Unit was successfully added.');
			
			if(!Session::has('user'))
			{
				return Redirect::to('/login');
			}

			$lgas = $lga->getLGAs();
			$wards = $ward->getWards();

			return view('polling.public.addunit', compact('lgas', 'wards'));
		}
	}
}
