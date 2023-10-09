<main class="z-50">
    <x-delete-button></x-delete-button>
    <section wire:click.away="toggleShow"
             class="@if (!$showModal)hidden @endif fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

             <content class="bg-white rounded-lg w-1/4 p-4 pt-2">
            <header class="flex justify-between items-center">
                <h2 class="text-2xl font-bold text-black mb-2">Deze activiteit verwijderen?</h2>

                <p class="cursor-pointer" wire:click="toggleShow">
                    <x-exit wire:click="toggleShow"/>
                </p>
            </header>
            <form action="{{ route('activity.destroy', $activity) }}" method="POST" class="flex flex-col items-center">
                @csrf
                @method('delete')
                <x-danger-button type="submit" class="w-auto h-2 text-center mt-4">
                    verwijderen
                </x-danger-button>
            </form>
        </content>
    </section>
</main>