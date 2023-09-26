<main>
    <x-button type="submit" wire:click="toggleShow">
        Inschijven
    </x-button>

    <section
        class="@if (!$showModal)hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
        wire:click.away="toggleShow">

        <div class="bg-white rounded-lg w-1/4 p-4">
            <h2 class="text-2xl font-bold text-black mb-1">Laat een opmerking achter</h2>

            <form action="{{ route('activity.register', $activity) }}" method="POST" class="flex flex-col items-center">
                @csrf
                <textarea name="comment" id="comment" rows="4" placeholder="Opmerkingen" clgass="w-full"></textarea>
                <x-button type="submit" class="mt-4 w-auto h-2 text-center px-4">
                    Inschijven
                </x-button>
            </form>
        </div>
    </section>
</main>
