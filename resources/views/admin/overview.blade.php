@extends('layouts.app')

@section('content')
    <main class="bg-white m-5 p-5 rounded-md">
        <h1 class="text-2xl border-b-2 border-gray-50 pb-2">Gebruikers</h1>
        <table class="w-full">
            <thead>
            <tr class="border-b-2 border-gray-50">
                <td class="px-4 py-2">Naam</td>
                <td class="px-4 py-2">Email</td>
                <td class="px-4 py-2">Acties</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="even:bg-white odd:bg-gray-50">
                    <td class="px-4 py-2">{{$user->name}}</td>
                    <td class="px-4 py-2">{{$user->email}}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.toggle', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @if ($user->is_admin)
                            <button type="submit" class="bg-red-100 text-red-400 hover:bg-red-200 transition-colors ease-in-out font-bold py-2 px-4 rounded">
                            Verwijder beheerder
                            </button>
                            @else
                            <button type="submit" class="bg-green-100 text-green-400 hover:bg-green-200 transition-colors ease-in-out font-bold py-2 px-4 rounded">
                            Maak beheerder
                            </button>
                            @endif

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
