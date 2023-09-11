@extends('layouts.app')

@section('content')
    <section class="pt-4 pb-4 bg-gray-100 h-auto">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
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
                    @foreach ($activities as $activity)
                        <tr>
                            <th class="px-4 py-2"><a href="{{ route('activity.show', $activity->id) }} ">{{$activity->name}}</a></th>
                            <td class="px-4 py-2">{{$activity->location}}</td>
                            <td class="px-4 py-2">{{$activity->food ? "Ja" : "Nee"}}</td>
                            <td class="px-4 py-2">{{$activity->price}}</td>
                            <td class="px-4 py-2">{{$activity->description}}</td>
                            <td class="px-4 py-2">{{ date('d-m-Y', strtotime($activity->start_date)) }}</td>
                            <td class="px-4 py-2">{{ date('d-m-Y', strtotime($activity->end_date)) }}</td>
                            <td class="px-4 py-2">{{$activity->max_participants}}</td>
                            <td class="px-4 py-2">{{$activity->min_participants}}</td>
                            <td class="px-4 py-2">{{$activity->image}}</td>
                            <td class="px-4 py-2">{{$activity->needs ?? "geen"}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
