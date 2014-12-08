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
			<h2 style="text-align:center; margin-bottom: 100px; color: red"> Top tay chơi</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<td><b>Đại gia: </b></td>
							<td><b>Tiền: </b></td>
						</tr>
						@for($i = 0; $i < count($topMoney); $i++)
							<tr>
								<td>{{ $topMoney[$i]->name }}</td>
								<td>{{ $topMoney[$i]->money . " VND" }}</td>
							</tr>
						@endfor		
				
					</table>
				</div>

			</div>

		</div>
	</div>
</div>

@stop