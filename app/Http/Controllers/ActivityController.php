<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activity.overview', [
            'activities' => Activity::where('start_date', '>', now())->get(),
        ]);
        $activity = Activity::all();
        return view('activity.overview', ['activity' => $activity]);
    }

    public function show($id)
    {
        $activity = Activity::find($id);
        return view('activity.show', ['activity' => $activity]);
    }

    public function submit($id)
    {
        $activity = Activity::find($id);
        $activity->users()->attach(auth()->user());

        return redirect()->route('overview');
    }
}
