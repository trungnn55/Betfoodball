<html>
<head>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('select').change(function(){
			var id = $(this).attr('id');
			var value = $(this).val();
			if(id =='team1'){
				alert(value);
				$('#team2 option').each(function(){
      				if (this.value == value)
        				$(this).hide();
    			});
			}else if(id =='team2'){
				$('#team1 option').each(function(){
      				if (this.value == value)
        				$(this).hide();
    			});
			}
		});
	});
</script>
</head>
<body>

@if( Session::has('confirm') )

    {{ Session::get('confirm') }}

@endif

{{ Form::open(array('route' => 'admin.addmatch','method'=>'post')) }}
<table>	

@foreach($team as $key)
	<?php $select[$key->name] = $key->name ?>
@endforeach

	<p>League: {{ Form::select('league', $league) }}</p>
	<p>Team1: {{ Form::select('team1', array($select), '', array('id'=>'team1')) }}</p>
	<p>Team2: {{ Form::select('team2', array($select),'',  array('id'=>'team2')) }}</p>
	<p>Rate :  {{ Form::text('rate') }}</p>
	<p>{{ Form::submit('Submit') }}</p>
	
	<p>{{ HTML::linkRoute('admin.addteam', 'Add Team') }}</p>
	<p>{{ HTML::linkRoute('index', 'Home') }}</p>
	<p>{{ HTML::linkRoute('logout', 'Logout') }}</p>
	

</table>
{{ Form::close() }}

</body>

</html>

