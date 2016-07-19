@extends('polling.layouts.main')
@section('title')
RESULTES
@endsection

@section('content')

	<div class="content-section-b">

        <div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12">
					<hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Poll Results
                        <br>
                    </h2>
				</div>
			</div>

            <div class="row">                
                <div class="col-lg-5  col-sm-5">
                <form action="{{URL::route('poll.result.check')}}" class="form-inline" method="GET">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
						<select name="pollingUnit" id="" class="form-control">
							<option value="">Select Pollin Unit</option>
							@forelse( $pollingunits as $unit)
								<option value="{{ $unit->uniqueid}}">{{$unit->polling_unit_name}}</option>
							@empty

							@endforelse
						</select>

						<button type="submit" class="btn btn-primary">Search</button>
					</div>
				</form>
                </div>
            </div>
			<br>
            @if($pollingResults)
				<div class="row">
				<hr><br>
					<div class="col-lg-8">
						<h2>Results for {{ $pollingunit->polling_unit_name}}</h2><hr>
						<table class="table table-responsive table-hover">
							<thead>
								<th>PARTY</th>
								<th>SCORE</th>
								<th>AGENT</th>
								<th>DATE</th>
							</thead>
							@forelse( $pollingResults as $result)
								<tr>
									<td>{{$result->party_abbreviation}}</td>
									<td>{{$result->party_score}}</td>
									<td><i>{{$result->entered_by_user or "n/a"}}</i></td>
									<td><small>{{ date('dS M, Y', strtotime($result->date_entered)) }}</small></td>
								</tr>
							@empty

							@endforelse
						</table>
					</div>
				</div>
            @endif
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

@endsection