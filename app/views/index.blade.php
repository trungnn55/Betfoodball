@extends('layout')

@section('opening')
	
	<style type="text/css">
		.logo{
			width: 120px;
			height: 120px;
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
					<table class="table table-hover">
					@for($i = 0; $i < count($team1); $i++)
						<tr>
							<td class= "click">{{ HTML::image($team1[$i]->logo, '', array('class'=>'logo' )). "<br>" .  $team1[$i]->name}} 
							<td><span style="width: 35%; float: left; text-align: center; margin-top: 5	0px">
									<h3>VS</h3><br>
								
								{{ link_to_route('match','Choose Team', $team1[$i]->matchid) }} 
								<p>
								@if(Auth::user()->id == 1)

									{{ link_to_route('result','update result', $team1[$i]->matchid) }}

								@endif
								</span>
							</td>
							<td class = "click">{{ HTML::image($team2[$i]->logo, '', array('class'=>'logo' ) ). "<br>" .  $team2[$i]->name }}</td>
							<td> 
								</p>
							</td>
						</tr>
					@endfor

					@for($i = 0; $i < count($result1); $i++)
						<tr>
							<td class= "click">{{ HTML::image($result1[$i]->logo, '', array('class'=>'logo' )). "<br>" .  $result1[$i]->name}} </td>
								<td>
									<span style="width: 10%; float: left; text-align: center; margin-top: 50px">
								
										{{ link_to_route('viewmatch','View Match', $result1[$i]->matchid) }}
									</span>
								</td>
								<td class = "click">{{ HTML::image($result2[$i]->logo, '', array('class'=>'logo' ) ). "<br>" .  $result2[$i]->name }}</td>
							</td>
						</tr>
					@endfor

					</table>
				</div>

			</div>

		</div>
	</div>
</div>

@stop