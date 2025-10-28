<x-layout>
    <div class="container mx-auto px-4 py-8">
        <x-button href="{{ route('guides.index') }}" class="bg-blue-200 mb-4">&larr; Back to all guides</x-button>

        <div class="rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">{{ $guide->title }}</h1>

            <div class="mb-4">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold">
                    Difficulty: {{ $guide->difficulty }}</span>
                @if($guide->category)
                    <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-blue-700">
                        Category: {{ $guide->category->name }}</span>
                @endif
            </div>

            <div class="prose max-w-none">
                <p class="text-white leading-relaxed">{{ $guide->description }}</p>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-500">Created: {{ $guide->created_at->format('M d, Y') }}
                    @if($guide->updated_at != $guide->created_at)Updated: {{ $guide->updated_at->format('M d, Y') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</x-layout>


