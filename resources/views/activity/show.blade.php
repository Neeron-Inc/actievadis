@extends('layouts.app')

@section('content')
    <article class="pt-4 pb-4 bg-red-100 h-auto">
        <aside class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="w-auto">
                    <thead>
                    <tr>
                        <th class="px-4 py-2">Naam activiteit</th>
                        <th class="px-4 py-2">Locatie</th>
                        <th class="px-4 py-2">Eten(bool)</th>
                        <th class="px-4 py-2">Kosten (double)</th>
                        <th class="px-2 py-2">Omschrijving</th>
                        <th class="px-4 py-2">Begintijd</th>
                        <th class="px-4 py-2">Eindtijd</th>
                        <th class="px-4 py-2">Max deelnemers</th>
                        <th class="px-4 py-2">Min deelnemers</th>
                        <th class="px-4 py-2">Afbeelding</th>
                        <th class="px-4 py-2">Benodigdheden</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="px-4 py-2">{{$activity->name}}</th>
                        <td class="px-4 py-2">{{$activity->location}}</td>
                        <td class="px-4 py-2">{{$activity->food}}</td>
                        <td class="px-4 py-2">{{$activity->price}}</td>
                        <td class="px-4 py-2">{{$activity->description}}</td>
                        <td class="px-4 py-2">{{$activity->start_date}}</td>
                        <td class="px-4 py-2">{{$activity->end_date}}</td>
                        <td class="px-4 py-2">{{$activity->max_participants}}</td>
                        <td class="px-4 py-2">{{$activity->min_participants}}</td>
                        <td class="px-4 py-2">{{$activity->image}}</td>
                        <td class="px-4 py-2">{{$activity->needs}}</td>
                    </tr>
                    </tbody>
                </table>
                <x-danger-button>
                    <a href="{{ route('activity.overview') }}">Terug naar activiteiten</a>
                </x-danger-button>
                <form action="{{ route('activity.register', $activity) }}" method="POST">
                    @csrf
                    <x-button type="submit">Meedoen met activiteit</x-button>
                </form>
            </div>
        </aside>
    </article>
@endsection
