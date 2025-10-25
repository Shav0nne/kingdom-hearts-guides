<x-app-layout>
    <form action="{{ route('guides.store') }}" method="post" class="space-y-4 p-6">
        @csrf
        <div>
            <label for="title" class="block font-semibold text-white">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border border-gray-300 rounded p-2 w-full">
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-semibold text-white">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full">{{ old('description') }}</textarea>
            @error('description')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="difficulty" class="block font-semibold text-white">Difficulty</label>
            <select name="difficulty" id="difficulty" class="border border-gray-300 rounded p-2 w-full">
                <option value="">Select difficulty</option>
                <option value="⭐" {{ old('difficulty') == '⭐' ? 'selected' : '' }}>⭐</option>
                <option value="⭐⭐" {{ old('difficulty') == '⭐⭐' ? 'selected' : '' }}>⭐⭐</option>
                <option value="⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                <option value="⭐⭐⭐⭐⭐" {{ old('difficulty') == '⭐⭐⭐⭐⭐' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
            </select>
            @error('difficulty')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block font-semibold text-white">Category</label>
            <select name="category_id" id="category_id" class="border border-gray-300 rounded p-2 w-full">
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <x-button type="submit" class="bg-blue-500">Create Guide</x-button>
    </form>
</x-app-layout>
