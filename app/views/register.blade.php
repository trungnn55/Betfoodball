@extends('layout')

@section('opening')
	
	<link rel="stylesheet" href="bootstrap/login/css/style.css" media="screen" type="text/css" />
	<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">  -->

@stop

@section('content')
	<div id="login">

        <p style="color: red"; >
        @if($errors->has())

        @foreach ($errors->all() as $error )

            {{ $error }}

        @endforeach

        @endif
        </p>

        <fieldset class="clearfix">

        	{{ Form::open(array('route' => 'register', 'method'=>'post')) }}

            <p>
            	<span class="fontawesome-user"></span>
            	{{ Form::text('username', '', array('placeholder'=>'Username')) }}
            </p>

            <p>
            	<span class="fontawesome-lock"></span>
            	{{ Form::password('password', array('placeholder'=>'Password')) }}
            </p>

            <p>
                <span class="fontawesome-lock"></span>
                {{ Form::password('confirmpassword', array('placeholder'=>'Confirm Password')) }}
            </p>

            <p>
                <span class="fontawesome-user"></span>
                {{ Form::text('name', '', array('placeholder'=>'Name')) }}
            </p> 

            <p>{{ Form::submit(' Register ') }}</p>

            {{ Form::close() }}

        </fieldset>

    </div>
	

@stop