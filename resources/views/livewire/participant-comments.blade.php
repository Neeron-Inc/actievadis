<main class="z-50">
    <p wire:click="toggleShow" class="mb-2 flex items-center"><span class="text-[#f5af00] pr-1"><x-group-icon></x-group-icon></span> {{$participants->count()}}
    </p>

    <section wire:click.away="toggleShow"
             class="@if (!$showModal) hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

        <content class="bg-white rounded-lg w-1/2 p-4 pt-2">
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-black mb-2">Alle comments</h2>

                <p class="text-black cursor-pointer" wire:click="toggleShow">
                    <x-exit wire:click="toggleShow"/>
                </p>
            </header>

            <div class="flex flex-col gap-6">
                @foreach($participants as $participant)
                    <div class="flex gap-2 text-black">
                        <p class="text-xl font-bold whitespace-nowrap">{{ $participant->user->name }}</p>
                        <p>{{$participant->comment}}</p>
                    </div>
                @endforeach
            </div>
        </content>
    </section>
</main>
