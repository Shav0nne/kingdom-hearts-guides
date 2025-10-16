<x-layout>
    <x-slot:heading> Guide Page {{$guide->title}}</x-slot:heading>
    <p>{{ $guide->description }}</p>
    <p>Category: {{ $guide->category->name }}</p>
</x-layout>
