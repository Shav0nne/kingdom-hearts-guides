<x-layout>
    <form action="{{ route('guides.store') }}" method="post" class="space-y-4 p-6">
        @csrf
        <div>
            <label for="title" class="block font-semibold text-white">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border border-gray-300 rounded p-2 w-full text-black">
            @error('title')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="image_url" class="block text-khGold font-semibold mb-2">Cover Image URL</label>
            <input type="url" name="image_url" id="image_url" value="{{ old('image_url') }}"
                   class="bg-white text-black w-full px-4 py-3 bg-khDark border border-khSky/30 rounded-lg text-khLight placeholder-khLight/50 focus:border-khGold focus:ring-2 focus:ring-khGold/20 transition-all duration-200"
                   placeholder="https://oyster.ignimgs.com/mediawiki/apis.ign.com/kingdom-hearts-ii/7/76/468px-KH_2.5_HD_Remix_Logo.jpg">
            <p class="text-khLight/60 text-sm mt-2">Paste a image URL from the web. Leave empty for default image.</p>
            @error('image_url')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-semibold text-white">Description</label>
            <textarea name="description" id="description" class="border border-gray-300 rounded p-2 w-full text-black">{{ old('description') }}</textarea>
            @error('description')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="difficulty" class="block font-semibold text-white">Difficulty</label>
            <select name="difficulty" id="difficulty" class="border border-gray-300 rounded p-2 w-full text-black">
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
            <select name="category_id" id="category_id" class="border border-gray-300 rounded p-2 w-full text-black">
                <option value="" class="text-black">Select a category</option>
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
</x-layout>
