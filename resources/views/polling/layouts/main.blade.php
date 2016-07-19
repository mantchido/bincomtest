<!DOCTYPE html>
<html>
	<head>
		<title>Poll Result Checker | @yield('title')</title>

		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		{!! Html::style('assets/css/bootstrap.css') !!}
	    {!! Html::style('assets/font-awesome/css/font-awesome.min.css') !!}
	    {!! Html::style('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic') !!}
	    {!! Html::style('assets/css/landing-page.css') !!}

	    @yield('styles')
		
	</head>

	<body>

	    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="{{URL::route('home')}}">Poll Result Checker</a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
	                <ul class="nav navbar-nav">	
	                	<li><a href="{{URL::route('poll.result.checker')}}">Check Results</a></li>
			            <li><a href="{{URL::route('poll.summed.result')}}">Summed Result</a></li>
			            <li><a href="{{URL::route('new.unit')}}">Add Polling Unit</a></li>
	                @if(Session::has('user')) 
	                	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Session::get('user')[0]['firstname']}} <span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li>
		                    	<a href="{{URL::route('agent.logout')}}">Logout</a>
		                    </li>
				          </ul>
				        </li>
	                    
                    @else
                    	<li>
	                    	<a href="{{URL::route('agent.login')}}">Agent Login</a>
	                    </li>
                    @endif
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>
		<br><br>
		
		@yield('content')

		<footer>
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-12">
	                    <ul class="list-inline">
	                        <li><a href="#home">Home</a>
	                        </li>
	                        <li class="footer-menu-divider">&sdot;</li>
	                        <li><a href="#about">Results</a>
	                        </li>
	                        <li class="footer-menu-divider">&sdot;</li>
	                        <li><a href="#contact">Contact</a>
	                        </li>
	                    </ul>
	                    <p class="copyright text-muted small">Copyright &copy; Polling Result Checker {{ date('Y') }}. All Rights Reserved</p>
	                </div>
	            </div>
	        </div>
	    </footer>

		@yield('scripts')
	
        {!! Html::script('assets/js/jquery-1.10.2.js') !!}
        {!! Html::script('assets/js/bootstrap.js') !!}
	</body>
</html>
