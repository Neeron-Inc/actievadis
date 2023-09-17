<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use \Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        return view('activity.overview', [
            'activities' => Activity::where('start_date', '>', now())->get(),
        ]);
    }

    public function create(): View
    {
        return view('activity.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->start_date = $request->input('start_date');
        $activity->end_date = $request->input('end_date');
        $activity->location = $request->input('location');
        if($request->input('food') == "on"){
            $activity->food = true;
        }else{
            $activity->food = false;
        }
        $activity->price = $request->input('price');
        $activity->max_participants = $request->input('max_participants');
        $activity->min_participants = $request->input('min_participants');
        $activity->image = Storage::disk('public')->put('images', $request->file('image'));
        $activity->needs = $request->input('needs');
        $activity->save();
        return redirect()->route('activity.overview');
    }

    public function show($id): View
    {
        $activity = Activity::find($id);
        return view('activity.show', ['activity' => $activity]);
    }

    public function register(Activity $activity): RedirectResponse
    {
        $activity->users()->attach(auth()->user());

        return redirect()->route('activity.show', ['id' => $activity->id]);
    }

    public function edit($id): View
    {
        $activity = Activity::find($id);

        $activity->start_date = $this->formatDate($activity->start_date);
        $activity->end_date = $this->formatDate($activity->end_date);

        return view('activity.edit', ['activity' => $activity]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $activity = Activity::find($id);
        $activity->name = $request->input('name');
        $activity->description = $request->input('description');
        $activity->start_date = $request->input('start_date');
        $activity->end_date = $request->input('end_date');
        $activity->location = $request->input('location');
        if($request->input('food') == "on"){
            $activity->food = true;
        }else{
            $activity->food = false;
        }
        $activity->price = $request->input('price');
        $activity->max_participants = $request->input('max_participants');
        $activity->min_participants = $request->input('min_participants');
        $activity->image = Storage::disk('public')->put('images', $request->file('image'));
        $activity->needs = $this->seperateNeeds($request->input('needs'));
        $activity->save();
        return redirect()->route('activity.show', ['id' => $activity->id]);
    }

    public function destroy($id): RedirectResponse
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect()->route('activity.overview');
    }

    public function formatDate($date): string
    {
        return date('Y-m-d', strtotime($date));
    }

    public function jsonEncode(string $needs): array
    {
        //json encode
        $needs = json_encode($needs);
        return explode(",", $needs);
    }
}
