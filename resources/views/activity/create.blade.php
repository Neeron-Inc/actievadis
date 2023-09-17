@extends('layouts.app')

@section('content')
    <div class="py-12 flex flex-col items-center">

        <h1 class="text-3xl font-bold mb-6">Activiteit aanmaken</h1>
        <form class="flex flex-col gap-4" action="{{ route('activity.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Naam activiteit</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Naam activiteit" required>
            </div>
            <div class="form-group">
                <label for="description">Omschrijving</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Omschrijving" required>
            </div>
            <div class="form-group">
                <label for="location">Locatie</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Locatie" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start datum</label>
                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start datum" required>
            </div>
            <div class="form-group">
                <label for="end_date">Eind datum</label>
                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Eind datum" required>
            </div>
            <div class="form-group">
                <label for="food">Eten</label>
                <input type="checkbox" class="form-control" id="food" name="food" placeholder="Eten">
            </div>
            <div class="form-group">
                <label for="price">Prijs</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Prijs" required>
            </div>
            <div class="form-group">
                <label for="max_participants">Max deelnemers</label>
                <input type="number" class="form-control" id="max_participants" name="max_participants" placeholder="Max deelnemers" required>
            </div>
            <div class="form-group">
                <label for="min_participants">Min deelnemers</label>
                <input type="number" class="form-control" id="min_participants" name="min_participants" placeholder="Min deelnemers" required>
            </div>
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Afbeelding">
            </div>
            <div class="form-group">
                <label for="needs">Benodigdheden (scheid per met comma)</label>
                <input type="text" class="form-control" id="needs" name="needs" placeholder="Benodigdheden">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
