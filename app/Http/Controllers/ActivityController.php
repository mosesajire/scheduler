<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ActivityFormRequest;

use App\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // User access only their activities only
        $user_id = auth()->user()->id;

        $activities = Activity::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityFormRequest $request)
    {
        $user_id = auth()->user()->id;

        $activity = new Activity;

        $activity->description = $request->input('description');
        $activity->start_time = $request->input('start_time');
        $activity->end_time = $request->input('end_time');
        $activity->status = $request->input('status');
        $activity->user_id = $user_id;

        $activity->save();

        return redirect('/activities')->with('success', 'You have created a new activity successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Activity::find($id))
        {
            $activity = Activity::find($id);

            return view('activities.edit', compact('activity'));
        }
        else
        {
            return redirect()->back()->with('error', 'Sorry, something went wrong. We could not find that activity.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityFormRequest $request, $id)
    {
        if(Activity::find($id))
        {
            $activity = Activity::find($id);

            // User can edit only their own activities
            if($activity->user_id == auth()->user()->id)
            {
                $activity->description = $request->input('description');
                $activity->start_time = $request->input('start_time');
                $activity->end_time = $request->input('end_time');
                $activity->status = $request->input('status');

                $activity->save();

                return redirect('/activities')->with('success', 'You have updated an activity successfully.');
            }
            else
            {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Access denied.');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Sorry, something went wrong. We could not find that activity.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if(Activity::find($id))
            {
            $activity = Activity::find($id);

            // User can delete only their own activities
            if($activity->user_id == auth()->user()->id)
            {
                $activity->delete();

                return redirect('/activities')->with('success', 'You have deleted an activity successfully.');
            }
            else
            {
                return redirect()->back()->with('error', 'Sorry, something went wrong. Access denied.');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Sorry, something went wrong. We could not find that activity.');
        }
    }
}