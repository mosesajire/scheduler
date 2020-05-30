@extends('layouts.app')

@section('title', 'Welcome')

@section('content')

    <div class="jumbotron text-center">
        <h1>Welcome to Scheduler</h1>
        <hr>
        <h2>Manage your daily activities with Scheduler.</h2>
        <h3>Plan your activities effectively and keep track of your daily progress easily.</h3>
        <p>&nbsp;</p>
        <a href="/register" class="btn btn-success btn-lg">GET STARTED</a> <a href="/login" class="btn btn-primary btn-lg">LOGIN</a>
    </div>

@endsection
