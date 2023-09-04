<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use LegacyTests\Browser\QueryString\Post;

class ActivityController extends Controller
{
    public function index()
    {
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
