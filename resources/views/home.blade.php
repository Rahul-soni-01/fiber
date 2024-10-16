<x-layout>
    <x-slot name="title">Home Page</x-slot>
    <x-slot name="main">
        <div>
            <h1>Home Page</h1>
            <h2>Welcome, {{ auth()->user()->name }}</h2>
            <h3>Your role: {{ auth()->user()->type }}</h3>
            @foreach($permissions as $department => $perms)
                {{-- {{ dd($permissions) }} --}}
            @endforeach
        </div>
    </x-slot>
</x-layout>