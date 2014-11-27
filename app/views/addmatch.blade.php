<html>

<body>

@if( Session::has('confirm') )

    {{ Session::get('confirm') }}

@endif

{{ Form::open(array('route' => 'admin.addmatch','method'=>'post')) }}
<table>	

@foreach($team as $key) 
	<?php $select[$key->name] = $key->name ?>
@endforeach


	<p>Team1: {{ Form::select('team1', array($select)) }}</p>
	<p>Team2: {{ Form::select('team2', array($select)) }}</p>
	<p>Rate :  {{ Form::text('rate') }}</p>
	<p>{{ Form::submit('Submit') }}</p>

	<p>{{ HTML::linkRoute('logout', 'Logout') }}</p>
	<p>{{ HTML::linkRoute('admin.addteam', 'Add Team') }}</p>

</table>
{{ Form::close() }}

</body>

</html>