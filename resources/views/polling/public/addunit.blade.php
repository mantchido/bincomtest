@extends('polling.layouts.main')

@section('title')
Add Result
@endsection

@section('content')
	<div class="content-section-b">

        <div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<h3>New Polling Unit</h3><hr>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					@if(Session::has('success'))
						<div class="alert alert-success">
							{{Session::get('success')}}
						</div>
					@endif
					<form action="" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="">Ward</label>
							<select name="wardid" id="" class="form-control">
								<option value="">Select Ward</option>
								@foreach($wards as $ward)
									<option value="{{$ward->uniqueid}}">{{$ward->ward_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="">LGA</label>
							<select name="lga" id="" class="form-control">
								<option value="">Select LGA</option>
								@foreach($lgas as $lga)
									<option value="{{$lga->uniqueid}}">{{ $lga->lga_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="">Unit Number</label>
							<input type="text" name="pollingunitnumber" value="{{ old('pollingunitnumber')}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Unit Name</label>
							<input type="text" name="pollingunitname" value="{{ old('pollingunitname')}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<textarea class="form-control" name="unitdescription" id="" cols="30" rows="5">{{old('unitdescription')}}</textarea>
						</div>
						<div class="form-group">
							<label for="">Longitude</label>
							<input type="text" name="longitude" value="{{old('longitude')}}" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Latitude</label>
							<input type="text" name="latitude" value="{{old('latitude')}}" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-primary">
								<i class="fa fa-plus"></i>
								 Add Unit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection