@extends('layouts.app')

@section('content')
    <div>
        <form class="flex w-full gap-4" action="{{ route('activity.store') }}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="w-1/2"></div>
            <div class="w-1/2 flex flex-col items-center justify-center bg-center bg-cover absolute h-screen top-0 z-0"
                 id="bgimg"
                 style="background-image: url(https://vtb-league.com/app/plugins/photonic/include/images/placeholder.png)">
                <div class="form-group">
                    <input type="file" class="form-control hidden" id="image" name="image" placeholder="Afbeelding">
                    <label
                        class="bg-[#0F132F] rounded-full w-12 h-12 flex items-center justify-center absolute cursor-pointer bottom-5 right-5"
                        for="image">
                        <x-camera-icon></x-camera-icon>
                    </label>
                </div>
            </div>
            <div class="w-1/2 grid grid-cols-2 gap-4 pt-12 px-10">
                <h1 class="text-[#0F132F] text-5xl col-span-2 pb-12">Activiteit aanmaken</h1>
                <div class="form-group">
                    <label for="name">naam</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="location">locatie</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="form-group">
                    <label for="start_date">start datum</label>
                    @error('start_date')
                    <div class="text-red-500">moet voor eind datum zijn</div>
                    @enderror
                    <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">eind datum</label>
                    @error('end_date')
                    <div class="text-red-500">moet na start datum zijn</div>
                    @enderror
                    <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                    <label for="food">eten</label>
                    <select class="form-control" id="food" name="food" required>
                        <option value="0">Nee</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">prijs</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="min_participants">minimale deelnemers</label>
                    @error('min_participants')
                    <div class="text-red-500">moet kleiner zijn dan maximale deelnemers</div>
                    @enderror
                    <input type="number" class="form-control" id="min_participants" name="min_participants" required>
                </div>
                <div class="form-group">
                    <label for="max_participants">maximale deelnemers</label>
                    @error('max_participants')
                    <div class="text-red-500">groter zijn dan minimale deelnemers</div>
                    @enderror
                    <input type="number" class="form-control" id="max_participants" name="max_participants" required>
                </div>
                <div class="form-group col-span-2">
                    <label for="description">omschrijving</label>
                    <textarea type="textarea" class="form-control" id="description" rows="3" name="description"
                              required></textarea>
                </div>
                <div class="form-group col-span-2">
                    <label for="needs">benodigdheden</label>
                    <textarea type="textarea" class="form-control" id="needs" rows="3" name="needs"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-auto px-4 py-2 border-2 border-black">toevoegen</button>
            </div>
        </form>
    </div>
    <script>
        document.querySelector("#image").onchange = evt => {
            const [file] = document.querySelector("#image").files
            if (file) {
                document.querySelector("#bgimg").style.backgroundImage = `url('${URL.createObjectURL(file)}')`
            }
        }
    </script>
@endsection
