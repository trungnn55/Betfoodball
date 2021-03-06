@extends('layout')

@section('opening')
	
	<style type="text/css">
		.logo{
			width: 120px;
			height: 120px;
		}		
		p{
			text-align: center;
		}
		h3{
			margin-top: 30px;
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

				<div class="table-responsive" style="margin-top: 50px">
					<table class="table table-hover">
					@for($i = 0; $i < count($team1); $i++)
						<tr>
							<td class= "click"><p>{{ HTML::image($team1[$i]->logo, '', array('class'=>'logo' )). "<br>" .  $team1[$i]->name}}</p></td> 
							<td>

								<h3>{{ $team1[$i]->league }}</h3>								
								<h3>{{ link_to_route('match', 'Chọn đội', $team1[$i]->matchid, array('class'=>'btn btn-primary btn-lg')) }}</h3>
								<h3>{{ $team1[$i]->result }} </h3>
								<p>
								@if( Auth::user()->manager == 1 )

									{{ link_to_route( 'result','Update Result', $team1[$i]->matchid ) . "<br>"}}
									{{ link_to_route( 'updatescore', 'Update Score', $team1[$i]->matchid ) }}

								@endif
								
							</td>
							<td class = "click"><p>{{ HTML::image($team2[$i]->logo, '', array('class'=>'logo' ) ). "<br>" .  $team2[$i]->name }}</p></td>
							<td> 
								</p>
							</td>
						</tr>
					@endfor

				<!--	@for($i = count($result1)-1; $i >= 0; $i--)
						<tr>
							<td class= "click"><p>{{ HTML::image($result1[$i]->logo, '', array('class'=>'logo' )). "<br>" .  $result1[$i]->name}}</p> </td>
								<td>
										<h3> {{ $result1[$i]->league }} </h3>
										<p>{{ link_to_route('viewmatch','View Match', $result1[$i]->matchid) }}</p>
										@if(Auth::user()->manager == 1)

											<p>{{ link_to_route('updateresult', 'ReUpdate Result', $result1[$i]->matchid)}}</p>
										@endif
								</td>
								<td class = "click"><p>{{ HTML::image($result2[$i]->logo, '', array('class'=>'logo' ) ). "<br>" .  $result2[$i]->name }}</p></td>
							</td>
						</tr>
					@endfor -->

					</table>
				</div>

			</div>

		</div>
	</div>
</div>

@stop