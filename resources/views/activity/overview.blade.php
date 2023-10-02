@extends('layouts.app')

@section('content')
    {{-- hero --}}
    <div class="w-full flex pt-20">
        <section class="w-1/2 h-[750px] bg-[#F5AF00] rounded-r-[30px] pl-20">
            <div class="text-[#0F132F] mt-32 flex flex-col">
                <h1 class="text-5xl ml-36">Activiteiten</h1>
                {{-- card --}}
                <main class="absolute mt-20 gap-10 flex">
                    <section class="flex self-end select-none">
                        <div class="w-12 h-12 rounded-full border-2 cursor-pointer flex justify-center items-center mr-2 border-[#0F132F]" id="left">
                            <img src="{{ asset("img/pijl.svg") }}" alt="" class="rotate-180">
                        </div>
                        <div class="w-12 h-12 rounded-full border-2 cursor-pointer flex justify-center items-center border-[#0F132F]" id="right">
                            <img src="{{ asset("img/pijl.svg") }}" alt="">
                        </div>
                    </section>
                    <section class="flex gap-10" id="card-container">
                        @foreach($activities as $activity)
                            <x-card :activity="$activity" />
                        @endforeach
                    </section>
                </main>
            </div>
        </section>
        <section class="w-1/2 pr-20 mt-32">
            <!-- create activity -->
            <a href="{{route('activity.create')}}" class="mx-2 bg-[#0F132F] text-white py-2 px-8 float-right rounded-full">Maak activiteit</a>
            <button class="mx-2 bg-[#0F132F] text-white py-2 px-8 float-right rounded-full">Filters</button>
        </section>
    </div>

    <script>
        var cards = document.querySelectorAll("#card")
        var count = 0
        cards.forEach( (i) => {
            count++
            i.name = count
            i.style.order = count
        })



        document.querySelector("#left").addEventListener("click", () => {
            document.querySelector("#card[name='1']").style.transform = "scale(0.8)"
            setTimeout(() => {
                cards.forEach( (i) => {
                    if(i.name == `${count}`) {
                        i.name = 1
                        i.style.order = 1
                    } else {
                        i.style.order = parseInt(i.name) +1
                        i.name = parseInt(i.name) +1
                    }
                })
                document.querySelector("#card[name='2']").style.transform = "scale(1)"
            }, 150);
        })

        document.querySelector("#right").addEventListener("click", () => {
            document.querySelector("#card[name='1']").style.transform = "scale(0.8)"
            setTimeout(() => {
                cards.forEach( (i) => {
                    if(i.name == "1") {
                        i.name = count
                        i.style.order = count
                    } else {
                        i.style.order = parseInt(i.name) -1
                        i.name = parseInt(i.name) -1
                    }
                })
                document.querySelector(`#card[name='${count}']`).style.transform = "scale(1)"
            }, 150);
        })
    </script>
@endsection
