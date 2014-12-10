@extends('layout')

@include('header')

@section('opening')
	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.submit').click(function(){
				if(confirm('Confirm submit')){

					$('.match').submit();
				}			        

		    });

		});
	</script>
	
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
		.form-control{
			width: 50%;
			margin-left: 110px;
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
					<p> {{ Form::text('team1goal', '', array('class' => 'form-control')) }} </p>
				</p>
			</div>

			<div class="col-lg-2">
				<p>
					<h3>VS</h3>
					<h3> {{ Form::text('rate', '', array('placeholder'=>$team1[$id]->rate, 'style'=>'width:50%')) }}</h3>
					<p style="margin: 50px">{{ Form::select('status', array('Closed'=>'Closed', ''=>'Opening'), '', array('class'=>'form-control', 'style'=>'width: 50%;
						margin-left: 42px;')) }}</p>
					<p>{{ link_to_route('deletematch','Delete Match', $id) }}</p>
				</p>
			</div>

			<div class="col-lg-3">
				<p class = "click">
					{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid, 'class'=>'logo' )) }}
					<h3> {{ $team2[$id]->name }} </h3>
					<p> {{ Form::text('team2goal', '', array('class' => 'form-control')) }} </p>
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
							
							<p> {{ Form::button('Submit', array('class'=>'submit btn btn-lg btn-success')) }} </p>
							
						@endif
					</fieldset>
				</div>

			</div>

			<div class="col-lg-3"></div>
		</div> 
									
		{{ Form::hidden('demo') }}

		{{ Form::close() }}

	</div>

</div>

@stop