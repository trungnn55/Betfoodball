@extends('layout')

@extends('header')
	
@section('opening')
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
  			$('.click').click(function(){
  				$('td').removeClass('selected');
				$(this).addClass('selected');
				$('input[name=choosen-team]').val(event.target.id);
  			});
  		});
		
	</script>
	<style type="text/css">
		.selected{
			background-color: green;                                           
		}
	</style>
@stop

@section('content')

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="col-lg-12">
			
			<!-- <a onclick="selectTeam($(this), 'a')">
				<span style="width: 45%; float: left; text-align: right">
					<img src="http://cdn.dota2lounge.com/img/teams/FD.jpg?07" width="180px" height="150" style="float: right; margin-left: 10%; margin-top: 100px">
				</span>
			</a>

			<div>
				<span style="width: 10%; float: left; text-align: center; margin-top: 150px"><h3>VS</h3></span> 		
			</div>

			<a onclick="selectTeam($(this), 'a')">
				<span style="width: 45%; float: left; text-align: left">
					<img src="http://cdn.dota2lounge.com/img/teams/FD.jpg?07" width="180px" height="150" style="float: left; margin-right: 10%; margin-top: 100px">
				</span>
			</a>

			{{ Form::open(array('route'=>'index', 'method'=>'post')) }}
				<a style="margin-left: 875px;"> {{ Form::submit('Accept Bet') }}</a>
			{{ Form::close() }}	 -->
			<div class="col-lg-2"></div>
			<div class="col-lg-8">

				<div class="table-responsive">
				{{ Form::open(array('route'=>array('postmatch', $team1[$id]->matchid), 'method'=>'post')) }}

					<table class="table table-hover">
						<tr>
							<td class= "click">{{ HTML::image($team1[$id]->logo,'', array('id'=>$team1[$id]->teamid)). "<br>" .  $team1[$id]->name}}</td> 
							<td><span style="width: 10%; float: left; text-align: center; margin-top: 150px">
								<h3>VS</h3>
								<h3> {{ 'Rate: '. $team1[$id]->rate }}</h3>
							</span></td>
							<td class = "click">{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid)). "<br>" .  $team2[$id]->name }}</td>
						</tr>

						<input type="submit" name="clickme" id="clickme" onclick="$.ajax" value="Submit"/>
						<!--{{ Form::submit('Submit') }}-->

					</table>
				{{ Form::hidden('choosen-team') }}

				{{ Form::close() }}

				</div>

			</div>

		</div>
	</div>
</div>

@stop