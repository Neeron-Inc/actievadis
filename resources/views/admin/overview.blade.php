@extends('layouts.app')

@section('content')
    <main class="bg-[#F5aF00] m-6 rounded-md">
        <h1 class="text-2xl">Beheerders</h1>
        <table class="w-auto">
            <thead>
            <tr>
                <th class="px-4 py-2">Naam</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Beheerder</th>
                <th class="px-4 py-2">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th class="px-4 py-2">{{$user->name}}</th>
                    <td class="px-4 py-2">{{$user->email}}</td>
                    <td class="px-4 py-2">{{$user->is_admin ? __('Ja') : __('Nee')}}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.toggle', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                {{$user->is_admin ? __('Verwijder beheerder') : __('Maak beheerder')}}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
