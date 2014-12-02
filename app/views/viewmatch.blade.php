@extends('layout')

@include('header')

@section('content')

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">

				<div class="table-responsive">
					{{ Form::open(array('route'=>array('postresult', $team1[$id]->matchid), 'method'=>'post', 'class'=>'match')) }}

					<table class="table table-hover">
						<tr>
							<td class= "click">
								{{ HTML::image($team1[$id]->logo,'', array('id'=>$team1[$id]->teamid, 'class'=>'logo' )) }}
								<h3> {{ $team1[$id]->name }} </h3>
								<h1> {{ Match::find($id)->result[0] }} </h1>
							</td> 
							<td>
								<h3>VS</h3>
								{{ "Rate: " . Match::find($id)->rate }}
							</td>
							<td class = "click">
								{{ HTML::image($team2[$id]->logo,'', array('id'=>$team2[$id]->teamid, 'class'=>'logo' )) }}
								<h3> {{ $team2[$id]->name }} </h3>
								<h1> {{ Match::find($id)->result[2] }} </h1>
							</td>
						</tr>

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

					{{ Form::close() }}

				</div>

			</div>

		</div>
	</div>
</div>

@stop