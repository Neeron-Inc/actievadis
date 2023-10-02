<main class="z-50">
    <x-button wire:click="toggleShow">
        @if ($participates)
            {{ __('Uitschrijven') }}
        @else
            {{ __('Inschrijven') }}
        @endif
    </x-button>

    <section wire:click.away="toggleShow"
             class="@if (!$showModal)hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

        <content class="bg-white rounded-lg w-1/4 p-4 pt-2">
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-black mb-2">Laat een opmerking achter</h2>

                <p class="cursor-pointer" wire:click="toggleShow">
                    <x-exit wire:click="toggleShow"/>
                </p>
            </header>

            <form wire:submit.prevent="participate">
                @csrf
                <textarea name="comment" id="comment" rows="4" placeholder="Opmerkingen"
                          class="w-full" wire:model="comment">
                </textarea>
                <x-button type="submit" class="w-auto h-2 text-center mt-4">
                    Inschijven
                </x-button>
            </form>
        </content>
    </section>
</main>
