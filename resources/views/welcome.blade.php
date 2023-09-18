<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>
<body class="antialiased bg-[#E2E8F0] overflow-hidden">
    {{-- header --}}
    <header class="h-20 bg-white w-full">

    </header>
    {{-- hero --}}
    <div class="w-full flex pt-20">
        <section class="w-1/2 h-[750px] bg-[#F5AF00] rounded-r-[30px] pl-20">
            <div class="text-[#0F132F] mt-32 flex flex-col">
                <h1 class="text-5xl ml-36">Activiteiten</h1>
    {{-- card --}}
    <main class="absolute mt-20 gap-10 flex">
        <section class="flex self-end">
            <div class="w-12 h-12 rounded-full border-2 cursor-pointer flex justify-center items-center mr-2 border-[#0F132F]" id="left">
                <img src="{{ asset("img/pijl.svg") }}" alt="" class="rotate-180">
            </div>
            <div class="w-12 h-12 rounded-full border-2 cursor-pointer flex justify-center items-center border-[#0F132F]" id="right">
                <img src="{{ asset("img/pijl.svg") }}" alt="">
            </div>
        </section>
        <section class="flex gap-10" id="card-container">
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
        </section>
    </main>
    



            </div>

        </section>
        <section class="w-1/2 pr-20 mt-32">
            <button class="bg-[#0F132F] text-white py-2 px-8 float-right rounded-full">Filters</button>
        </section>
    </div>

    <script>
        var cards = document.querySelectorAll("#card")
        var count = 1
        cards.forEach( (i) => {
            i.name = count
           i.style.order = count
            count++
        })

        document.querySelector("#left").addEventListener("click", () => {
            document.querySelector("#card[name='1']").style.transform = "scale(0.8)"
            setTimeout(() => {
            cards.forEach( (i) => {
                if(i.name == "10") {
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
                i.name = 10
                i.style.order = 10
                } else {
                    i.style.order = parseInt(i.name) -1
                    i.name = parseInt(i.name) -1
                }
            })  
            document.querySelector("#card[name='10']").style.transform = "scale(1)"
            }, 150);
        })
    </script>

</body>
</html>
