@extends('layout')

@include('header')

@section('opening')
	
	<style type="text/css">
		.logo{
			width: 200;
			height: 200px;
		}		
		p{
			text-align: center;
		}
		h3{
			margin-top: 50px;
			text-align: center;
		}
		h1{
			text-align: center;
		}

	</style>
@stop


@section('content')

<div id="page-wrapper">
	<div class="container-fluid">
		{{ Form::open(array('route'=>array('postresult', $team1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}
		<div class="col-lg-12" style="margin-top: 50px">
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
					
				<p class= "click">
					{{ HTML::image($team1[$id]->logo,'', array('id'=>$team1[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $team1[$id]->name }} </h3>
					<h1> {{ $result1 }} </h1>
				</p> 
			</div>

			<div class="col-lg-2">
				<h3 style="margin-top: 70px">{{ $team1[$id]->league }}</h3>
				<h3>VS</h3>
				<h3>{{ "Tỷ lệ: " . Match::find($id)->rate }}</h3>
			</div>

			<div class="col-lg-3">
				<p class = "click">
					{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $team2[$id]->name }} </h3>
					<h1> {{ $result2 }} </h1>
				</p>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p>
					@foreach( $userbetteam1 as $value )
						<p> {{ $value->betname . ": " . $value->money/1000 . "K"}} </p>
					@endforeach
				</p>
			</div>

			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p>
					@foreach( $userbetteam2 as $value )
						<p> {{ $value->betname . ": " . $value->money/1000 . "K"}} </p>
					@endforeach
				</p>
			</div>
		</div>
		{{ Form::close() }}
		
	</div>
</div>

@stop