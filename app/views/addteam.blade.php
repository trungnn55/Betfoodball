<html>

<body>

@if( Session::has('confirm') )
   {{ Session::get('confirm') }}
@endif

{{ Form::open(array('route' => 'admin.addteam','method'=>'post')) }}
<table>	

	<p>Team: {{ Form::text('name') }}</p>
	<p>Link :  {{ Form::text('logo') }}</p>
	<p>{{ Form::submit('ADD') }}</p>

	{{ HTML::linkRoute('logout', 'Logout') }}

</table>
{{ Form::close() }}

</body>
</html>