@extends('layouts.app')

@section('content')
    <aside class="mt-24 pb-28 bg-[#0f132f] w-8/12 h-auto">
        <article class="ml-96 text-xl">
            <h3 class="pt-44 text-[#f5af00]">tests</h3>
            <p class="text-white w-8/12">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur sit, inventore repudiandae iusto quasi fugiat veniam facere accusantium laudantium pariatur amet beatae voluptatem quaerat alias eveniet molestiae  labore ut deleniti libero vitae! Illum, libero accusantium. Porro cum vitae aut rerum aperiam aspernatur ab. Iusto quaerat ut architecto natus amet, commodi cumque<br><br> blanditiis nulla! Magnam maxime laudantium modi illo, molestiae, rem dicta deleniti amet nostrum adipisci quo quae veritatis quod exercitationem! Mollitia suscipit eos, similique aperiam in ullam sed qui pariatur hic dolore dolor odio libero labore ipsa delectus cum saepe.</p>
            <form action="{{ route('activity.register', $activity) }}" method="POST">
                @csrf
                <x-button type="submit">Inschijven</x-button>
            </form>
        </article>
    </aside>
@endsection


{{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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

</div> --}}