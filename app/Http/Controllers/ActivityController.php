<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('activity.overview', [
            'activities' => Activity::where('start_date', '>', now())->get(),
        ]);
    }

    public function show($id)
    {
        $activity = Activity::find($id);
        return view('activity.show', ['activity' => $activity]);
    }

    public function register(Activity $activity)
    {
        $activity->users()->attach(auth()->user());

        return redirect()->route('activity.show', ['id' => $activity->id]);
    }

    public function delete(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activity.overview');
    }
}
