<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
        Activity::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'food' => $request->input('food') == 'on' ? true : false,
            'price' => $request->input('price'),
            'max_participants' => $request->input('max_participants'),
            'min_participants' => $request->input('min_participants'),
            'image' => Storage::disk('public')->put('images', $request->file('image')),
            'needs' => $request->input('needs') ? $this->jsonEncode($request->input('needs')) : null,
        ]);

        return redirect()->route('activity.overview');
    }

    public function show(Activity $activity): View
    {
        return view('activity.show', ['activity' => $activity]);
    }

    public function edit(Activity $activity): View
    {
        $activity->start_date = $this->formatDate($activity->start_date);
        $activity->end_date = $this->formatDate($activity->end_date);

        return view('activity.edit', ['activity' => $activity]);
    }

    public function update(Activity $activity, Request $request): RedirectResponse
    {
        $activity->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'food' => $request->input('food') == 'on' ? true : false,
            'price' => $request->input('price'),
            'max_participants' => $request->input('max_participants'),
            'min_participants' => $request->input('min_participants'),
            'image' => $request->file('image') ? Storage::disk('public')->put('images', $request->file('image')) : $activity->image,
            'needs' => $request->input('needs') ? $this->jsonEncode($request->input('needs')) : $activity->needs,
        ]);

        return redirect()->route('activity.show', ['activity' => $activity]);
    }


    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        return redirect()->route('activity.overview');
    }

    public function formatDate($date): string
    {
        // return for example monday the 13th at 13:00

        return date('l-dS \a\t H:i', strtotime($date));
     }

    public function jsonEncode(string $needs): array
    {
        $needs = json_encode($needs);
        return explode(",", $needs);
    }

    public function register(Activity $activity): RedirectResponse
    {
        $activity->users()->attach(auth()->user());

        return redirect()->route('activity.show', ['activity' => $activity]);
    }

    public function delete(Activity $activity): RedirectResponse
    {
        $activity->delete();
        return redirect()->route('activity.overview');
    }
}
