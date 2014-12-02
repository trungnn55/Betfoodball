@extends('layout')

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

@include('header')

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">

				<div class="table-responsive">
					{{ Form::open(array('route'=>array('postmatch', $team1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}

					<table class="table table-hover">
						<tr>
							<td class= "click">
								{{ HTML::image($team1[$id]->logo,'', array('id'=>$team1[$id]->teamid, 'class'=>'logo' )) }}
								<h3> {{ $team1[$id]->name }} </h3>
							</td> 
							<td>
								<h3>VS</h3>
								<h3> {{ 'Rate: '. $team1[$id]->rate }}</h3>
								@if(Match::find($id)->status == "")

									{{ Form::select('betmoney', array('100000'=>'100K','200000'=>'200K','300000'=>'300K','400000'=>'400K','500000'=>'500K')) }}
								
								@endif
							</td>
							<td class = "click">

								{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid, 'class'=>'logo' )) }}

								<h3> {{ $team2[$id]->name }} </h3>
							</td>
						</tr>
						@if(Match::find($id)->status == "")
						<tr>
							<td></td>
							<td> {{ Form::submit('Submit') }} </td>
							<td></td>
						</tr>
						@endif
						<tr>
							<td>
								@foreach( $userbetteam1 as $value )

									<p> {{ $value->betname . ": " . $value->betmoney/1000 . "K"}} </p>
								
								@endforeach
							</td>
							<td></td>
							<td>
								@foreach( $userbetteam2 as $value )
								
									<p> {{ $value->betname . ": " . $value->betmoney/1000 . "K"}} </p>
								
								@endforeach
							</td>
						</tr>
					</table>

					{{ Form::hidden('choosen-team') }}

					{{ Form::close() }}

				</div>

			</div>

		</div>
	</div>
</div>

@stop