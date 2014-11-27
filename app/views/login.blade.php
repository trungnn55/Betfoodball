@extends('layout')

@section('opening')
	
	<link rel="stylesheet" href="bootstrap/login/css/style.css" media="screen" type="text/css" />
	<!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700"> --> 

@stop

@section('content')
	<div id="login">
        <p style="color: red">
            @if( Session::has('notification') )
                {{ Session::get('notification') }}  
            @endif
        </p>

        <p style="color: red">
            @if( Session::has('message') )
                {{ Session::get('message') }}
            @endif
        </p>

        <fieldset class="clearfix">

        	{{ Form::open(array('route' => 'login', 'method'=>'post')) }}

            <p>
            	<span class="fontawesome-user"></span>
            	{{ Form::text('username', '', array('placeholder'=>'Username')) }}
            </p>

            <p>
            	<span class="fontawesome-lock"></span>
            	{{ Form::password('password', array('placeholder'=>'Password')) }}
            </p>

            <p>{{ Form::submit(' Sign In ') }}</p>

            {{ Form::close() }}

        </fieldset>

        <p>
        	Not a member? 
        	{{ HTML::linkRoute('register', 'Sign up now')}}
        	<span class="fontawesome-arrow-right"></span>
        </p>

    </div>
	

@stop