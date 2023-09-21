@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('activity.update', $activity) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="name" class="sr-only">Naam activiteit</label>
                    <input type="text" name="name" id="name" placeholder="Naam activiteit" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $activity->name }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>

                    @enderror
                </div>
                <div class="mb-4">
                    <label for="location" class="sr-only">Locatie</label>
                    <input type="text" name="location" id="location" placeholder="Locatie" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('location') border-red-500 @enderror" value="{{ $activity->location }}">

                    @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>

                    @enderror
                </div>
                <div class="mb-4">
                    <label for="food" class="sr-only">Eten</label>
                    <input type="checkbox" name="food" id="food" placeholder="Eten" class="bg-gray-100 border-2 p-4 rounded-lg @error('food') border-red-500 @enderror" value="{{ $activity->food }}">

                    @error('food')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>

                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="sr-only">Kosten</label>
                    <input type="number" name="price" id="price" placeholder="Kosten" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ $activity->price }}">
                    @error('price')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="sr-only">Omschrijving</label>
                    <input type="text" name="description" id="description" placeholder="Omschrijving" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{ $activity->description }}">
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="start_date" class="sr-only">Begintijd</label>
                    <input type="date" name="start_date" id="start_date" placeholder="Begintijd" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('start_date') border-red-500 @enderror" value="{{ $activity->start_date }}">
                    @error('start_date')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="end_date" class="sr-only">Eindtijd</label>
                    <input type="date" name="end_date" id="end_date" placeholder="Eindtijd" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('end_date') border-red-500 @enderror" value="{{ $activity->end_date }}">
                    @error('end_date')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="max_participants" class="sr-only">Max deelnemers</label>
                    <input type="number" name="max_participants" id="max_participants" placeholder="Max deelnemers" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('max_participants') border-red-500 @enderror" value="{{ $activity->max_participants }}">
                    @error('max_participants')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="min_participants" class="sr-only">Min deelnemers</label>
                    <input type="number" name="min_participants" id="min_participants" placeholder="Min deelnemers" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('min_participants') border-red-500 @enderror" value="{{ $activity->min_participants }}">
                    @error('min_participants')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="needs" class="sr-only">Needs</label>
                    <input type="text" name="needs" id="needs" placeholder="Needs" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('needs') border-red-500 @enderror" value="{{ is_array($activity->needs) ? rtrim(implode(',', $activity->needs), ',') : $activity->needs }}">
                    @error('needs')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="sr-only">Afbeelding</label>
                    <input type="file" name="image" id="image" placeholder="Afbeelding" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror" value="{{ $activity->image }}">
                    @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Activiteit aanpassen</button>
            </form>
@endsection
