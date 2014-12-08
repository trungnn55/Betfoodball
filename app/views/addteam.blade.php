<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(":file").css("background-color","red");
});
</script>
</head>
<body>

@if( Session::has('confirm') )
   {{ Session::get('confirm') }}
@endif

@if( $errors->has() )
    @foreach ($errors->all() as $error ) 
        {{ $error }}
    @endforeach
@endif

{{ Form::open(array('route' => 'admin.addteam','method'=>'post','files'=>true)) }}
<table>	

	<p>Team: {{ Form::text('name') }}</p>
	<!-- <p>Link :  {{ Form::text('logo') }}</p> -->
	Logo: <input type="file" name="logo">
	<p>{{ Form::submit('ADD') }}</p>

	<p> {{ HTML::linkRoute('admin.addmatch', 'Add Match') }} </p>
	<p> {{ HTML::linkRoute('index', 'Home') }} </p>
	<p> {{ HTML::linkRoute('logout', 'Logout') }} </p>

</table>
{{ Form::close() }}

</body>
</html>