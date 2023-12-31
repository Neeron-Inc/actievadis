<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(?Collection $activities = null): View
    {
        if (!$activities) {
            $activities = Activity::with('participants')->where('start_date', '>', now())->get();
        }

        return view('activity.overview', [
            'activities' => $activities,
        ]);
    }

    public function filter(): View
    {
        $activities = null;

        if (request()->input('all') == 'on' && request()->input('participating') == 'on') {
            $activities = auth()->user()->activities();
        }

        if (request()->input('all') == 'on' && !request()->input('participating')) {
            $activities = Activity::all();
        }

        if (request()->input('participating') == 'on' && !request()->input('all')) {
            $activities = auth()->user()->activities();

            $activities = $activities->filter(function ($activity) {
                return $activity->start_date > now();
            });
        }

        return $this->index($activities);
    }

    public function create(): View
    {
        return view('activity.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request);

        Activity::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'food' => $request->input('food'),
            'price' => $request->input('price'),
            'max_participants' => $request->input('max_participants'),
            'min_participants' => $request->input('min_participants'),
            'image' => Storage::disk('public')->put('images', $request->file('image')),
            'needs' => $request->input('needs') ? $this->formatNeeds($request->input('needs')) : null,
        ]);

        return redirect()->route('activity.overview');
    }

    public function show(Activity $activity): View
    {
        if ($activity->needs) {
            $activity->needs = implode(", ", $activity->needs);
        }
        return view('activity.show', [
            'activity' => $activity,
        ]);
    }

    public function edit(Activity $activity): View
    {
        if ($activity->needs) {
            $activity->needs = implode(", ", $activity->needs);
        }
        $activity->start_date = $this->formatDate($activity->start_date);
        $activity->end_date = $this->formatDate($activity->end_date);

        return view('activity.edit', [
            'activity' => $activity,
        ]);
    }

    public function update(Activity $activity, Request $request): RedirectResponse
    {
        $this->validateRequest($request);

        $activity->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'food' => $request->input('food'),
            'price' => $request->input('price'),
            'max_participants' => $request->input('max_participants'),
            'min_participants' => $request->input('min_participants'),
            'image' => $request->file('image') ? Storage::disk('public')->put('images', $request->file('image')) : $activity->image,
            'needs' => $request->input('needs') ? $this->formatNeeds($request->input('needs')) : null,
        ]);

        return redirect()->route('activity.show', [
            'activity' => $activity,
        ]);
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        return redirect()->route('activity.overview');
    }

    public function formatDate($date): string
    {
        return date('Y-m-d\TH:i', strtotime($date));
    }

    public function formatNeeds($needs): array
    {
        return explode(",", str_replace('"', '', $needs));
    }

    public function validateRequest($request): void
    {
        $request->validate([
            'start_date' => 'required|before:end_date',
            'end_date' => 'required|after:start_date',
            'max_participants' => 'required|gt:min_participants',
            'min_participants' => 'required|lt:max_participants|gt:1',
        ]);
    }
}
