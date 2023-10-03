@extends('layouts.app')

@section('content')
    <aside class="py-16 bg-[#0f132f] w-10/12 lg:w-4/6">
        <article class="text-xl flex">

            <div class="w-2/3 pl-16 lg:pl-64">
                <p class="text-[#f5af00] mt-[15%]">Samen met je collega's!</p>
                <h2 class="text-5xl text-white pb-4">{{$activity->name}}</h2>
                <div class="text-white w-[130%] mb-8 flex flex-col">
                    <p class="mb-2 flex items-center"> <span class="text-[#f5af00] pr-1"><x-location-icon></x-location-icon></span> {{$activity->location}}</p>
                    <p class="mb-2 flex items-center"><span class="fill-[#f5af00] pr-1"><x-food-icon></x-food-icon></span> {{$activity->food ? "Ja" : "Nee"}}</p>
                    <p class="mb-2 flex items-center"><span class="text-[#f5af00] pr-1"><x-money-icon></x-money-icon></span> €{{$activity->price}}</p>

                    @if(date('d-m-Y', strtotime($activity->start_date)) == date('d-m-Y', strtotime($activity->end_date)))
                        <p class="mb-2 flex items-center">
                            <span class="text-[#f5af00] pr-1"><x-clock-icon></x-clock-icon></span>
                            {{ \Carbon\Carbon::parse($activity->start_date)->isoFormat('D MMMM YYYY [om] H:mm') }} tot {{ \Carbon\Carbon::parse($activity->end_date)->isoFormat('H:mm') }}
                        </p>
                    @else
                        <p class="mb-2 flex items-center">
                            <span class="text-[#f5af00] pr-1"><x-clock-icon></x-clock-icon></span>
                            {{ \Carbon\Carbon::parse($activity->start_date)->isoFormat('D MMMM YYYY [om] H:mm') }} tot {{ \Carbon\Carbon::parse($activity->end_date)->isoFormat('D MMMM YYYY [om] H:mm') }}
                        </p>
                    @endif

                    <p class="mb-2 flex items-center"><span class="text-[#f5af00] pr-1"><x-group-icon></x-group-icon></span> {{$activity->participants->count()}}</p>

                    @isset($activity->needs)
                        <p class="mb-2 flex items-center"><span class="text-[#f5af00] pr-1"><x-shopping-card-icon></x-shopping-card-icon></span> {{$activity->needs}}</p>
                    @endisset

                    <p class="mb-6">{{$activity->description}}</p>
                </div>
                <div class="pb-[15%] flex justify-content">

                    <livewire:participate :activity="$activity"/>

                    @if(auth()->user()->is_admin)
                        <form action="{{ route('activity.update', $activity) }}" method="GET">
                            @csrf
                            <x-edit-button></x-edit-button>
                        </form>
                        <form action="{{ route('activity.delete', $activity) }}" method="POST">
                            @csrf
                            @method('delete')
                            <x-delete-button></x-delete-button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="w-1/3 bg-center bg-cover rounded-tr-[50px] rounded-bl-[50px] translate-x-[50%]" style="background-image: url('{{ file_exists(public_path('storage/' . $activity->image)) ? asset("storage/" . $activity->image) : $activity->image }}')"></div>

        </article>
    </aside>
@endsection
