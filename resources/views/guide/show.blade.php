<x-app-layout>
    <h2>Details from ...</h2>
    <p>{{$guide->title}}</p>
    <p>{{$guide->description}}</p>
    <p>{{$guide->difficulty}}</p>

{{--    <a href="{{ route ('guide.show', $guide->id) }}">details</a>--}}
</x-app-layout>
