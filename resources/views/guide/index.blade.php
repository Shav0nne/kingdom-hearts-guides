<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">All Guides</h1>

        <div class="mb-5">
            <a href="{{ route('guides.create') }}" class="text-white">Create New Guide</a>
        </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($guides as $guide)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl mb-2">{{ $guide->title }}</h2>
                        <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($guide->description) }}</p>
                        <p class="text-sm text-gray-500 mb-4">Difficulty: {{ $guide->difficulty }}</p>
                        <a href="{{ route('guides.show', $guide->id) }}" class="inline-block bg-blue-500 text-white">View Details</a>
                    </div>
                @endforeach
            </div>
</x-app-layout>
