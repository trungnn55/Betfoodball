@extends('layout')

@section('opening')

	<link rel="stylesheet" href="bootstrap/login/css/style.css" media="screen" type="text/css" />
	<script src="{{ url('js/jquery.min.js') }}"></script>
	<script>
		$(document).ready(function(){
  			$('.click').click(function(){
  				$('p').removeClass('selected');
				$(this).addClass('selected');
				$('input[name=choosen-team]').val(event.target.id);
  			});
  		});
 
		$(document).ready(function(){
			$(".submit").click(function(){
				var value = $('input[name=choosen-team]').val() ;
				if(value == ''){
					alert("Ban chua chon Team ");
				}
			});
		});
	
	</script>
	<style type="text/css">
		.selected{
			background-color: green;
		}

		.logo{
			width: 200px;
			height: 200px;                                           
			text-align: center;
		}

		h3{
			text-align: center;
			margin-top: 20px;
		}	

		p{
			text-align: center;
		}

		select{
			width: 100px;
			height: 30px;
		}
		.form-control{
			width: 150px;
			margin-left: 60px;
		}

	</style>
@stop

@section('content')

@include('header')

<div id="page-wrapper">
	<div class="container-fluid">

		{{ Form::open(array('route'=>array('postmatch', $team1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}

		<div class="col-lg-12" style="margin-top: 50px">
			<p><h2 style="color: red; text-align: center; margin-bottom: 50px">Click vào logo để chọn đội</h2></p>
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p class= "click">
					{{ HTML::image($team1[$id]->logo,'', array( 'id'=>$team1[$id]->name, 'class'=>'logo', )) }}
					<h3> {{ $team1[$id]->name }} </h3>
				</p>
			</div>

			<div class="col-lg-2">
				<p>
					<h3 style="margin-top: 70px">{{ $team1[$id]->league }}</h3>
					<h3> {{ 'Tỷ lệ: '. $team1[$id]->rate }}</h3>
					@if(Match::find($id)->status == "")

						<h3>{{ Form::select('betmoney', array('100000'=>'100K','200000'=>'200K','300000'=>'300K','400000'=>'400K','500000'=>'500K'), '', array('class'=>'form-control')) }}</h3>
					
					@endif
				</p>
			</div>

			<div class="col-lg-3">
				<p class = "click">

					{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->name, 'class'=>'logo' )) }}

					<h3> {{ $team2[$id]->name }} </h3>
				</p>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-3"></div>

			<div class="col-lg-2">
				<div id="login">
					<fieldset class="clearfix">
						@if(Match::find($id)->status == "")
							
							<p> {{ Form::submit('ACCEPT BET', array('class'=>'submit btn btn-lg btn-success')) }} </p>

						@elseif(Match::find($id)->status == "Closed")

							<p style="font-size: 2em; color: red">  Closed </p>
							
						@endif
					</fieldset>
				</div>

			</div>

		</div> 

		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-3">
				<p>
					@foreach( $userbetteam1 as $value )

						<p> {{ $value->betname . ": " . $value->betmoney/1000 . "K"}} </p>
					
					@endforeach
				</p>
			</div>

			<div class="col-lg-2"></div>

			<div class="col-lg-3">
				<p>
					@foreach( $userbetteam2 as $value )
						<p> {{ $value->betname . ": " . $value->betmoney/1000 . "K"}} </p>
					@endforeach
				</p>
			</div>
		</div> 
									
		{{ Form::hidden('choosen-team') }}

		{{ Form::close() }}

	</div>

</div>

@stop