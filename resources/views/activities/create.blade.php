@extends('layouts.app')

@section('title', 'Create New Activity')

@section('content')

	<p><button class="btn btn-default"><a href="/activities">Manage Your Schedule</a></button></p>

	<div class="card">
		<div class="card-header">
			<h1>Your Schedule: Add New Activity</h1>
		</div>
		<div class="card-body">
			<!-- Include file for messages/notifications -->
			@include('includes.messages')

			<form action="/activities" method="post">
				<div class="form-group">
					<label for="description">What do you want to do?</label>
					<textarea name="description" id="description" rows="4" class="form-control" required="required">{{ old('description') }}</textarea>
				</div>

				<div class="form-group">
					<label for="start_time">When should the activity start?</label>
					<input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" >
				</div>

				<div class="form-group">
					<label for="end_time">When should the activity end?</label>
					<input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}">
				</div>

				<input type="hidden" name="status" value="1">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<input type="submit" name="submit" value="CREATE" class="btn btn-primary">
			</form>
		</div>
	</div>
@endsection