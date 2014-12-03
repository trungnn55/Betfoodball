@extends('layout')

@include('header')

@section('opening')
    
    <link rel="stylesheet" href="bootstrap/login/css/style.css" media="screen" type="text/css" />
    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">  -->

@stop

@section('content')

<div id="login" style="margin-top: 100px">
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

    <fieldset class="clearfix">

        {{ Form::open(array('route' => 'changepassword', 'method'=>'post')) }}

        <p>
            <span class="fontawesome-lock"></span>
            {{ Form::password('currentPassword', array('placeholder'=>'Current Password')) }}
        </p>

        <p>
            <span class="fontawesome-lock"></span>
            {{ Form::password('newPassword', array('placeholder'=>'New Password')) }}
        </p>

        <p>
            <span class="fontawesome-lock"></span>
            {{ Form::password('confirmPassword', array('placeholder'=>'Confirm Password')) }}
        </p>
        <p>{{ Form::submit(' Change ') }}</p>

        {{ Form::close() }}

    </fieldset>

</div>

@stop