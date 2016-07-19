@extends('polling.layouts.main')

@section('title')
Home
@endsection

@section('content')
	
	<div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Poll Result Checker</h1>
                        <h3>A Smart Poll Result Checker by Emmanuel Benson</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li><a href="{{URL::route('poll.result.checker')}}" class="btn btn-default btn-lg"><i class="fa fa-bar-chart-o fa-fw"></i> <span class="network-name">Check Results</span></a>
                            </li>
                            <li><a href="{{URL::route('poll.summed.result')}}" class="btn btn-default btn-lg"> <span class="network-name">Summed Results</span></a>
                            </li>
                            <li><a href="{{URL::route('new.unit')}}" class="btn btn-default btn-lg"><i class="fa fa-plus fa-fw"></i> <span class="network-name">Add Result</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

@endsection