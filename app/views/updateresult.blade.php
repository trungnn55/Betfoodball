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
		h1{
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

		{{ Form::open(array('route'=>array('postupdateresult', $result1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}

		<div class="col-lg-12" style="margin-top: 50px">			
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p class= "click">
					{{ HTML::image($result1[$id]->logo,'', array('id'=>$result1[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $result1[$id]->name }} </h3>
					<h1> {{ $score1 }} </h1>
					<p> {{ Form::text('result1goal') }} </p>
				</p>
			</div>

			<div class="col-lg-2">
				<p>
					<h3>VS</h3>
					<h3> {{ 'Tỷ lệ: '. $result1[$id]->rate }}</h3>
					<p style="margin: 50px">{{ Form::select('status', array('Closed'=>'Closed', ''=>'Opening')) }}</p>
				</p>
			</div>

			<div class="col-lg-3">
				<p class = "click">
					{{ HTML::image($result2[$id]->logo,'', array('id'=>$result2[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $result2[$id]->name }} </h3>
					<h1> {{ $score2 }} </h1>
					<p> {{ Form::text('result2goal') }} </p>
				</p>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-3"></div>

			<div class="col-lg-2">
				<div id="login">
					<fieldset class="clearfix">

							<p> {{ Form::submit('Submit') }} </p>
							
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