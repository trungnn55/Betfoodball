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
			margin-top: 50px;
			text-align: center;
		}
		td{
			text-align: left;
		}

	</style>
@stop

@section('content')

@include('header')


<div id="page-wrapper">
	
	<div class="container-fluid">
		<div class="col-lg-12">
			
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
			<h2 style="text-align:center; margin-bottom: 100px; color: red"> Lịch sử cá cược</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<td><b>Trận đấu: </b></td>
							<td><b>Kết quả: </b></td>
							<td><b>Tiền cược: </b></td>
						</tr>
						@for($i = 0; $i < count($bethistory); $i++)
							<tr>
								<?php $id = (integer)$bethistory[$i]->id; 
								 ?>
								@if($bethistory[$i]->teampick == $bethistory[$i]->team1)
									
									@if($bethistory[$i]->status > 0)
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: rgb(28, 200, 28)"> {{$bethistory[$i]->result}} </td>
										<td style="color: rgb(28, 200, 28)">{{ $bethistory[$i]->money . " VND" }}</td>

									@elseif($bethistory[$i]->status == 'Closed')
										<td> {{ link_to_route('match', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: grey"> {{$bethistory[$i]->result}} </td>
										<td style="color: grey"> Đang chờ... </td>
									
									@elseif($bethistory[$i]->status == 0 && $bethistory[$i]->status != '')
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td> {{ $bethistory[$i]->result }} </td>
										<td> {{ $bethistory[$i]->money . " VND" }}</td>
									
									@elseif($bethistory[$i]->status < 0)
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: red"> {{$bethistory[$i]->result}} </td>
										<td style="color: red">{{ $bethistory[$i]->money . " VND" }}</td>

									
									
									@else
										<td> {{ link_to_route('match', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: grey"> Đang chờ... </td>
										<td style="color: grey"> Đang chờ... </td>
									@endif
								

								@else

									@if($bethistory[$i]->status > 0)
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: red"> {{$bethistory[$i]->result}} </td>
										<td style="color: red">{{ $bethistory[$i]->money . " VND" }}</td>

									@elseif($bethistory[$i]->status == 'Closed')
										<td> {{ link_to_route('match', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: grey"> {{$bethistory[$i]->result}} </td>
										<td style="color: grey"> Đang chờ... </td>
									
									@elseif($bethistory[$i]->status == 0 && $bethistory[$i]->status != '')
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td> {{ $bethistory[$i]->result }} </td>
										<td> {{ $bethistory[$id]->money . ' VND' }}</td>
									
									@elseif($bethistory[$i]->status < 0)
										<td> {{ link_to_route('viewmatch', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: rgb(28, 200, 28)"> {{$bethistory[$i]->result}} </td>
										<td style="color: rgb(28, 200, 28)">{{ $bethistory[$i]->money . " VND" }}</td>

									@else
										<td> {{ link_to_route('match', $bethistory[$i]->team1 . ' vs ' . $bethistory[$i]->team2, $id, array('class'=>'list-group-item')) }} </td>
										<td style="color: grey"> Đang chờ... </td>
										<td style="color: grey"> Đang chờ... </td>
									@endif
								@endif
							</tr>
						@endfor		
				
					</table>
				</div>

			</div>

		</div>
	</div>
</div>

@stop