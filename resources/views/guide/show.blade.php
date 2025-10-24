<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <a href="{{ route('guides.index') }}" class="inline-block mb-4 text-blue-500 hover:text-blue-700">&larr; Back to all guides</a>

        <div class="bg-white rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $guide->title }}</h1>

            <div class="mb-4">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold ">
                    Difficulty: {{ $guide->difficulty }}
                </span>
                @if($guide->category)
                    <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-blue-700">
                        Category: {{ $guide->category->name }}
                    </span>
                @endif
            </div>

            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed">{{ $guide->description }}</p>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500">
                    Created: {{ $guide->created_at->format('M d, Y') }}
                    @if($guide->updated_at != $guide->created_at)
                        | Updated: {{ $guide->updated_at->format('M d, Y') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</x-app-layout>


{{--<x-app-layout>--}}
{{--    <h2>Details from ...</h2>--}}
{{--    <p>{{$guide->title}}</p>--}}
{{--    <p>{{$guide->description}}</p>--}}
{{--    <p>{{$guide->difficulty}}</p>--}}
{{--    <a href="{{ route ('guide.show', $guide->id) }}">details</a>--}}
{{--</x-app-layout>--}}

