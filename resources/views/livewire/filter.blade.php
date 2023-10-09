<main>
    <button wire:click="toggleShow" type="submit"
            class="mx-2 bg-[#0F132F] text-white py-2 px-8 float-right rounded-full">Filters
    </button>

    <section
        class="@if (!$showModal)hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

        <div wire:click.away="toggleShow" class="bg-white rounded-lg w-1/4 p-4">
            <header class="flex justify-around items-center mb-5">
                <h2 class="text-2xl font-bold text-black mb-1">Welke activiteiten wil je zien?</h2>

                <p class="cursor-pointer" wire:click="toggleShow">
                    <x-exit wire:click="toggleShow"></x-exit>
                </p>

            </header>

            <form action="{{ route('activity.overview.filter') }}" method="POST" class="flex flex-col items-center">
                @csrf


                <section class="flex justify-around w-full">
                    <div class="flex">
                        <input class="w-5 h-5" name="all" type="checkbox" wire:model="all">
                        <p class="pl-2">Alle activiteiten</p>
                    </div>

                    <div class="flex">
                        <input class="w-5 h-5" name="participating" type="checkbox" wire:model="participating">
                        <p class="pl-2">Ingeschreven</p>
                    </div>

                </section>
                <!-- submit button -->
                <x-button type="submit" class="mt-4 w-auto h-2 text-center px-4">
                    Filteren
                </x-button>
            </form>
        </div>
    </section>
</main>
