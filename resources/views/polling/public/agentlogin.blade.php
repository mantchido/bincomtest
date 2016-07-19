@extends('polling.layouts.main')

@section('title')
Agent Login
@endsection

@section('content')
	<div class="content-section-b">

        <div class="container">
			<div class="row">
            	<div class="col-lg-3 col-sm-3 col-lg-offset-5 col-sm-offset-5">
            		<form action="{{URL::route('agent.post.login')}}" method="POST">
            			<input type="hidden" name="_token" value="{{csrf_token()}}">
	            		<div class="thumbnail" style="padding:20px">
	            			<h3><i class="fa fa-user"></i> Enter Your Names </h3><hr>
	            			<div class="form-group">
	            				<label for="">First Name</label>
	            				<input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control">
	            			</div>

	            			<div class="form-group">
	            				<label for="">Last Name</label>
	            				<input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control">
	            			</div>

	            			<div class="form-group">
	            				<button type="submit" class="btn btn-primary">Login</button>
	            			</div>
	        			</div>
            		</form>
            		@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
            	</div>
            </div>
        </div>
    </div>
@endsection