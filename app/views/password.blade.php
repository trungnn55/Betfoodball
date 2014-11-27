@extends('layout')

@extends('header')

@section('content')

<div class = "col-lg-12">

    <p style="color: red">
        @if($errors->has())
        @foreach ($errors->all() as $error ) 
            {{ $error }}
        @endforeach
        @endif
    </p>

    <p style="color: red">
    @if(Session::has('message'))

		{{ Session::get('message')}}

	@endif
    </p>

    {{ Form::open(array('route' => 'changepassword','method'=>'post')) }}
    
    <h5> Current password </h5>
    {{ Form::password('currentPassword')."<br>" }}

    <h5> New password </h5>
    {{ Form::password('newPassword')."<br>" }}
	
	<h5> Confirm password </h5>
	{{ Form::password('confirmPassword') . "<br>" }} 

	<p>{{ Form::submit('  Change  ') }}</p>

    {{ Form::close() }}