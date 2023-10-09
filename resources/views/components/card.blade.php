<a href="{{ route('activity.show', $activity) }}" class="w-[20vw] bg-white transition-all ease-in-out shadow-lg relative" id="card" name="card">
    <div class="w-full h-[40vh] bg-center flex justify-center items-center group overflow-hidden bg-cover relative" style="background-image: url({{ file_exists(public_path('storage/' . $activity->image)) ? asset("storage/" . $activity->image) : $activity->image }})">
        <div class="w-full h-full flex justify-center items-center bg-gray-950 bg-opacity-0 group-hover:bg-opacity-40 ease-in-out transition-all">
            <div class="w-[7vw] h-[7vw] hidden group-hover:flex rounded-full bg-[#F5AF00] justify-center items-center">
                <img src="{{ asset("img/pijl.svg") }}" alt="">
            </div>
        </div>
        @if($activity->is_participating())
            <div class="absolute top-0 left-0 text-green-500 px-2 py-2 rounded-tr-lg">
                <x-badge />
            </div>
        @endif
        @if(auth()->user()->is_admin())
            <div class="absolute bottom-0 right-0 bg-white text-black px-4 py-2 rounded-tl-lg">
                <span class="text-semibold">Inschrijvingen:</span> {{ $activity->participants()->count() }}
            </div>
        @endif
    </div>
    <div class="text-center py-4 px-8 bg-white">
        <h6 class="text-[#0F132F] mb-1">{{ $activity->name }}</h6>
        <p class="text-xs text-[#717696]">
            {{ $activity->description }}
        </p>
    </div>
</a>
