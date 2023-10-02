@extends('layouts.app')

@section('content')
    <div class="flex w-full bg-[#e2e8f0]">
        <form class="flex w-full gap-4" action="{{ route('activity.update', $activity->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Assuming you are using the PUT method for updates -->

            <!-- Insert image here -->
            <div class="w-1/2 flex flex-col items-center justify-center bg-no-repeat bg-cover"  style="background-image: url({{ file_exists(public_path('storage/' . $activity->image)) ? asset("storage/" . $activity->image) : $activity->image }})">
                <!-- in topleft use x-exit.bladephp -->

                <svg data-darkreader-inline-stroke="" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-1/5 text-[#0F132F]">
                    <path d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="form-group">
                    <label for="image">Afbeelding</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Afbeelding">
                </div>
            </div>

            <div class="w-1/2 grid grid-cols-2 gap-4 my-12">
                <!-- activiteit aanmaken -->
                <h1 class="text-[#0F132F] text-5xl col-span-2">Activiteit aanpassen</h1>

                <div class="form-group">
                    <label for="name">naam</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $activity->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="location">locatie</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $activity->location) }}" required>
                </div>

                <div class="form-group">
                    <label for="start_date">start datum</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $activity->start_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="end_date">eind datum</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $activity->end_date) }}" required>
                </div>

                <div class="form-group">
                    <label for="food">eten</label>
                    <select class="form-control" id="food" name="food" required>
                        <option value="0" {{ old('food', $activity->food) == 0 ? 'selected' : '' }}>Nee</option>
                        <option value="1" {{ old('food', $activity->food) == 1 ? 'selected' : '' }}>Ja</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">prijs</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $activity->price) }}" required>
                </div>

                <div class="form-group">
                    <label for="min_participants">minimale deelnemers</label>
                    <input type="number" class="form-control" id="min_participants" name="min_participants" value="{{ old('min_participants', $activity->min_participants) }}" required>
                </div>

                <div class="form-group">
                    <label for="max_participants">maximale deelnemers</label>
                    <input type="number" class="form-control" id="max_participants" name="max_participants" value="{{ old('max_participants', $activity->max_participants) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">omschrijving</label>
                    <input type="textarea" class="form-control" id="description" name="description" value="{{ old('description', $activity->description) }}" required>
                </div>

                <div class="form-group">
                    <label for="needs">benodigdheden</label>
                    <input type="textarea" class="form-control" id="needs" name="needs" value="{{ old('needs', $activity->needs) }}">
                </div>

                <button type="submit" class="btn btn-primary w-auto px-4 py-2 border-2 border-black">bijwerken</button>
            </div>
        </form>
    </div>
@endsection
