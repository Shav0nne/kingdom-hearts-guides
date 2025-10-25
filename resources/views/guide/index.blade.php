<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">All Guides</h1>

        <div class="mb-5">
            <x-button href="{{ route('guides.create') }}" class="bg-green-500">Create New Guide</x-button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($guides as $guide)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl mb-2">{{ $guide->title }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($guide->description) }}</p>
                    <p class="text-sm text-gray-500 mb-4">Difficulty: {{ $guide->difficulty }}</p>

                    <div class="flex gap-2">
                        <x-button href="{{ route('guides.show', $guide->id) }}" class="bg-blue-500">View Details</x-button>
                        <x-button href="{{ route('guides.edit', $guide->id) }}" class="bg-yellow-500">Edit</x-button>
                        <form action="{{ route('guides.destroy', $guide->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" class="bg-red-500"
                                      onclick="return confirm('Are you sure you want to delete this guide?')">Delete</x-button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
