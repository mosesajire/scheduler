@extends('layouts.app')

@section('title', 'Your Activities')

@section('content')
	<p><a href="/activities/create" class="btn btn-primary">Add New Activity</a></p>

	<div class="card">
		<div class="card-header">
			<h1>Your Schedule: All Activities</h1>
		</div>
		<div class="card-body">
			<!-- Include file for messages/notifications -->
			@include('includes.messages')

			@if(isset($activities) && count($activities) > 0)

			<table class="table table-hover table-responsive">
				<thead class="thead-light">
					<tr>
						<th>Date</th>
						<th>Activity</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Status</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
				</thead>

				@foreach($activities as $activity)
				<tbody>
					<tr>
						<td>{{$activity->created_at->format('d/m/Y')}}</td>
						<td>{{$activity->description}}</td>
						<td>{{$activity->start_time}}</td>
						<td>{{$activity->end_time}}</td>
						<td>
								{{-- Set status: 1= Pending, 2= Ongoing, others =Completed --}}
							@if($activity->status == 1)
								<span class="text-danger">Pending</span>
							@elseif($activity->status == 2)
								<span class="text-primary">Ongoing</span>
							@else
								<span class="text-success">Completed</span>
							@endif
						</td>
						<td>
							<a href="/activities/{{$activity->id}}/edit" class="btn btn-success">Update</a>
						</td>
						<td>
						{{-- Add a delete form --}}
							<form action="/activities/{{$activity->id}}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="submit" value="Delete" class="btn btn-danger" onclick="return confirm('You are about to delete an activity. Click OK to continue')">
							</form>
						</td>
					</tr>
				</tbody>
				@endforeach
			</table>

				{{-- Add the Pagination Link --}}
				{{$activities->links()}}
			@else
				<p>You have not created any activity yet. <a href="/activities/create">Create New Activity</a></p>

			@endif

		</div>
	</div>
@endsection