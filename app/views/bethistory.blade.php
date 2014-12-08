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
	@if(Auth::User()->manager == 1)
		{{ link_to_route('admin.addteam', 'Add Team') . "<br>"}}
		{{ link_to_route('admin.addmatch', 'Add Match') }}
	@endif
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
								@if($bethistory[$i]->teampick == $bethistory[$i]->team1)
									<td>
										<b>{{ $bethistory[$i]->team1 }}</b> <i>vs</i>  {{ $bethistory[$i]->team2 }}
									</td>
								@else
									<td>{{ $bethistory[$i]->team1 }} <i>vs</i>  <b>{{ $bethistory[$i]->team2 }}</b>	</td>
								@endif
								@if($bethistory[$i]->status > 0)
									<td style="color: green"> Thắng </td>
									<td>{{ $bethistory[$i]->money . " VND" }}</td>
								
								@elseif($bethistory[$i]->status == '')
									<td style="color: grey"> Đang chờ... </td>
									<td style="color: grey"> Đang chờ... </td>
								
								@elseif($bethistory[$i]->status == 0)
									<td> Hoà </td>
									<td> 0 VND</td>
								
								@else
									<td style="color: red"> Thua </td>
									<td>{{ $bethistory[$i]->money . " VND" }}</td>
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