<main>
    <button wire:click="toggleShow" type="submit"
            class="mx-2 bg-[#0F132F] text-white py-2 px-8 float-right rounded-full">Filters
    </button>

    <section
        class="@if (!$showModal)hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

        <div wire:click.away="toggleShow" class="bg-white rounded-lg w-1/4 p-4">
            <header class="flex justify-between items-center mb-5">
                <h2 class="text-2xl font-bold text-black mb-1">Welke activiteiten wil je zien?</h2>

                <p class="cursor-pointer" wire:click="toggleShow">
                    <x-exit wire:click="toggleShow"></x-exit>
                </p>

            </header>

            <form action="{{ route('activity.overview.filter') }}" method="POST" class="flex flex-col items-center">
                @csrf


                <section class="flex justify-around w-full">
                    <div class="flex">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:model="all" name="all">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          </label>
                        <p class="pl-2">Alle activiteiten</p>
                    </div>

                    <div class="flex">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" wire:model="participating" name="participating">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                          </label>
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
