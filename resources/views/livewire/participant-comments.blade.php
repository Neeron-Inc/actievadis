<main class="z-50">
    <p @if(auth()->user()->is_admin) wire:click="toggleShow"
       @endif class="@if(auth()->user()->is_admin) cursor-pointer @endif mb-2 flex items-center"><span
            class="text-[#f5af00] pr-1"><x-group-icon></x-group-icon></span> {{$participants->count()}}
        van de {{$activity->max_participants}} deelnemers
    </p>
    </p>
    @if(auth()->user()->is_admin)
        <section wire:click.away="toggleShow"
                 class="@if (!$showModal) hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

            <content class="bg-white rounded-lg w-1/2 max-h-[50vh] overflow-y-scroll no-scrollbar p-4 pt-2">
                <header class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-black mb-2">Opmerkingen</h2>

                    <p class="text-black cursor-pointer" wire:click="toggleShow">
                        <x-exit wire:click="toggleShow"/>
                    </p>
                </header>

                <div class="flex flex-col gap-6">
                    @foreach($participants as $participant)
                        <div class=" text-black">
                            <span class="flex items-center">
                                <p class="text-base mr-2 font-semibold whitespace-nowrap">{{ $participant->user->name }}</p>
                                <p class="text-sm text-gray-400">{{$participant->created_at->diffForHumans()}}</p>
                            </span>


                            <p class="text-sm">{{$participant->comment}}</p>
                        </div>
                    @endforeach

                </div>
            </content>
        </section>
    @endif
</main>
