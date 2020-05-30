@extends('layouts.app')

@section('title', 'Your Activity')

@section('content')

	<div class="card">
		<div class="card-header">
			<h1>Your Activity</h1>
		</div>
		<div class="card-body">
			<!-- Include file for messages/notifications -->
			@include('includes.messages')

		</div>
	</div>

@endsection