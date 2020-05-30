@extends('layouts.app')

@section('title', 'Edit Your Activity')

@section('content')

	<div class="card">
		<div class="card-header">
			<h1>Edit Activity</h1>
		</div>
		<div class="card-body">
			<!-- Include file for messages/notifications -->
			@include('includes.messages')

			@if(isset($activity))

				<form action="/activities/{{$activity->id}}" method="post">
					<div class="form-group">
						<label for="description">What do you want to do?</label>
						<textarea name="description" id="description" rows="5" class="form-control">{{ $activity->description }}</textarea>
					</div>

					<div class="form-group">
						<label for="start_time">When should the activity start?</label>
						<input type="time" name="start_time" id="start_time" value="{{ $activity->start_time }}">
					</div>

					<div class="form-group">
						<label for="end_time">When should the activity end?</label>
						<input type="time" name="end_time" id="end_time" value="{{ $activity->end_time }}">
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status">
							<option value="">--Select Status--</option>
							<option value="1" @if($activity->status == 1) selected @endif>Pending</option>
							<option value="2" @if($activity->status == 2) selected @endif>Ongoing</option>
							<option value="3" @if($activity->status == 3) selected @endif>Completed</option>
						</select>
					</div>

					<input type="hidden" name="_method" value="PUT">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<input type="submit" name="submit" value="UPDATE" class="btn btn-success">
				</form>
			@else
				<p>Sorry, somethin went wrong. Please try again.</p>
			@endif
		</div>
	</div>
@endsection