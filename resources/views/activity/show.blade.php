@extends('layouts.app')

@section('content')
    <aside class="z-0 mt-24 pb-28 bg-[#0f132f] w-8/12 h-auto">
        <article class="ml-96 text-xl">
            <img class="h-[600px] w-[600px] ml-[650px] mt-24 absolute" src="{{$activity->image}}" alt="Hey cassandra">
            <p class="pt-44 text-[#f5af00]">Samen met je collega's!</p>
            <h2 class="text-6xl text-white pb-4">{{$activity->name}}</h2>
            <p class="text-white w-8/12 mb-16">Locatie: {{$activity->location}} <br> Eten: {{$activity->food ? "Ja" : "Nee"}} <br> Prijs: {{$activity->price}} <br> Beschijving: {{$activity->description}} <br><br> 
            Begintijd: {{$activity->start_date}} <br> Eindtijd: {{$activity->end_date}} <br> Max deelnemers: {{$activity->max_participants}} <br> Min deelnemers: {{$activity->min_participants}} <br> Benodigdheden: {{$activity->needs}}</p>
            <div class="flex justify-content">
                <form action="{{ route('activity.register', $activity) }}" method="POST">
                    @csrf
                    <x-button type="submit">Inschijven</x-button>
                </form>
                <form action="{{ route('activity.delete', $activity) }}" method="POST">
                    @csrf
                    @method('delete')
                    <x-delete-button></x-delete-button>
                </form>
            </div>
        </article> 
    </aside>
@endsection