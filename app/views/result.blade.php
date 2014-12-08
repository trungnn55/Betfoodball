@extends('layout')

@include('header')

@section('opening')
	
	<style type="text/css">

		.logo{
			width: 200px;
			height: 200px;                                           
		}

		h3{
			text-align: center;
		}	

		p{
			text-align: center;
		}

	</style>
@stop

@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
	<p style="color: red; font-size: 2em">
		@if($errors->has())
		@foreach($errors->all() as $value)
			{{ $value }}
		@endforeach
		@endif
	</p>

		{{ Form::open(array('route'=>array('postresult', $team1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}

		<div class="col-lg-12" style="margin-top: 50px">			
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p class= "click">
					{{ HTML::image($team1[$id]->logo,'', array('id'=>$team1[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $team1[$id]->name }} </h3>
					<p> {{ Form::text('team1goal') }} </p>
				</p>
			</div>

			<div class="col-lg-2">
				<p>
					<h3>VS</h3>
					<h3> {{ 'Tỷ lệ: '. $team1[$id]->rate }}</h3>
					<p style="margin: 50px">{{ Form::select('status', array('Closed'=>'Closed', ''=>'Opening')) }}</p>
					<p>{{ link_to_route('deletematch','Delete Match', $id) }}</p>
				</p>
			</div>

			<div class="col-lg-3">
				<p class = "click">
					{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $team2[$id]->name }} </h3>
					<p> {{ Form::text('team2goal') }} </p>
				</p>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-3"></div>

			<div class="col-lg-2">
				<div id="login">
					<fieldset class="clearfix">
						@if(Match::find($id)->status == "" || Match::find($id)->status == "Closed")
							
							<p> {{ Form::submit('Submit') }} </p>
							
						@endif
					</fieldset>
				</div>

			</div>

			<div class="col-lg-3"></div>
		</div> 
									
		{{ Form::hidden('choosen-team') }}

		{{ Form::close() }}

	</div>

</div>

@stop