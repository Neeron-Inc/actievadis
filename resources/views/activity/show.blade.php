@extends('layouts.app')

@section('content')
    <aside class="mb-8 pt-16 pb-16 bg-[#0f132f] w-8/12">
        <article class="ml-[16%] pt-[%] text-xl flex flex-row-reverse">

            <div>
                <img class="h-[100%] w-[1900px] ml-[35%] rounded-tr-[10%] rounded-bl-[10%]" src="{{ file_exists(public_path('storage/' . $activity->image)) ? asset("storage/" . $activity->image) : $activity->image }}" alt="Hier komt een image">
            </div>
            <div>
                <p class="text-[#f5af00] mt-[15%]">Samen met je collega's!</p>
                <h2 class="text-5xl text-white pb-4">{{$activity->name}}</h2>
                <div class="text-white w-[130%] mb-8 flex flex-col">
                    <p class="mb-2">Locatie: {{$activity->location}}</p>
                    <p class="mb-2">Eten: {{$activity->food ? "Ja" : "Nee"}}</p>
                    <p class="mb-2">Prijs: €{{$activity->price}}</p>

                    @if(date('d-m-Y', strtotime($activity->start_date)) == date('d-m-Y', strtotime($activity->end_date)))
                        <p class="mb-2">Wanneer begint het? <br> {{ date('l dS \a\t H:i', strtotime($activity->start_date)) }}</p>
                    @else
                        <p class="mb-2">Wanneer begint het? {{ date('d-m-Y h:i', strtotime($activity->start_date)) }}</p>
                        <p class="mb-2">wanneer eindigd het?: {{ date('d-m-Y h:i', strtotime($activity->end_date)) }}</p>
                    @endif

                    <p class="mb-2">Ingeschreven deelnemers: {{$activity->participants->count()}}</p>

                    @isset($activity->needs)
                        <p class="mb-2">Benodigdheden: {{$activity->needs}}</p>
                    @endisset

                    <p class="mb-6">Beschijving: {{$activity->description}}</p>
                </div>
                <div class="pb-[15%] flex justify-content">
                    <form action="{{ route('activity.register', $activity) }}" method="POST">
                        @csrf
                        <x-button type="submit">Inschijven</x-button>
                    </form>
                    @if(auth()->user()->is_admin)
                        <form action="{{ route('activity.delete', $activity) }}" method="POST">
                            @csrf
                            @method('delete')
                            <x-delete-button></x-delete-button>
                        </form>
                    @endif
                </div>
            </div>
        </article>
    </aside>
@endsection
