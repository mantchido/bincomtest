@extends('polling.layouts.main')

@section('title')
Summed Result
@endsection

@section('content')
	<div class="content-section-b">

        <div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Summed Results
                        <br>
                    </h2>
				</div>
			</div>

            <div class="row">
            	<div class="col-lg-9 col-sm-9">
            		<form action="{{URL::route('poll.post.summed.result')}}" method="GET" class="form-inline">
            			<input type="hidden" name="_token" value="{{csrf_token()}}">
            			<div class="form-group">
            				<select name="lga" id="lga" class="form-control">
            					<option value="">Select LGA</option>
            					@forelse($lgas as $lga)
									<option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
            					@empty

            					@endforelse
            				</select>
            				<button type="submit" class="btn btn-primary">Go</button>
            			</div>
            		</form>
            	</div>
            </div>
            
            <div class="row">
            	<div class="col-lg-4 col-sm-4">
            		<hr>
            		<h3>{{ $selectedlga->lga_name or ''}}</h3>
            		<ul class="list-group">
						<li class="list-group-item">Total Result
							<span class="badge">
                            @if(count($pollresults) > 0)
            					{{ $pollresults->sum('party_score') }}
                            @else
                                {{ "0" }}
                            @endif
            				</span>
    					</li>
            		</ul>
            	</div>
            </div>
            
        </div>
    </div>
@endsection